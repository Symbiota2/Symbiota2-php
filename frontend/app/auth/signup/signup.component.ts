import {Component, OnInit} from '@angular/core';
import {FormControl, FormGroup, Validators} from '@angular/forms';
import {Observable} from 'rxjs';

import {UserService} from '../user.service';
import {SpinnerOverlayService} from '../../shared/spinner-overlay.service';

@Component({
    selector: 'app-createaccount-outlet',
    templateUrl: './signup.component.html',
    styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {
    isPublicValue = 0;

    constructor(public userService: UserService, public spinnerService: SpinnerOverlayService) {}

    createaccountForm: FormGroup;

    static checkLoginSpaces(control: FormControl): { [s: string]: boolean } {
        if (/[^0-9A-Za-z_!@#$-+]/.test(control.value)) {
            return {'spaces': true};
        }
        return null;
    }

    static checkPasswords(form: FormGroup): { [s: string]: boolean } {
        const pwdControl = form.get('password');
        const pwd2Control = form.get('retypedPassword');
        if (pwdControl != null && pwd2Control != null && form.dirty) {
            const pwdVal = pwdControl.value;
            const pwd2Val = pwd2Control.value;
            const pwdErr = {};
            const pwd2Err = {};
            if (pwdVal !== pwd2Val) {
                pwdErr['PasswordsDoNotMatch'] = true;
                pwd2Err['PasswordsDoNotMatch'] = true;
            }
            if (pwdControl.touched) {
                if (pwdVal) {
                    if (pwdVal.length < 6) {
                        pwdErr['minlength'] = true;
                    } else if (pwdVal.charAt(0) === ' ' || pwdVal.slice(-1) === ' ') {
                        pwdErr['spaces'] = true;
                    }
                } else {
                    pwdErr['required'] = true;
                }
                if (Object.keys(pwdErr).length === 0) {
                    pwdControl.setErrors(null);
                } else {
                    pwdControl.setErrors(pwdErr);
                }
                pwdControl.markAsTouched();
            }
            if (pwd2Control.touched) {
                if (pwd2Val) {
                    if (pwd2Val.length < 6) {
                        pwd2Err['minlength'] = true;
                    } else if (pwd2Val.charAt(0) === ' ' || pwd2Val.slice(-1) === ' ') {
                        pwd2Err['spaces'] = true;
                    }
                } else {
                    pwd2Err['required'] = true;
                }
                if (Object.keys(pwd2Err).length === 0) {
                    pwd2Control.setErrors(null);
                } else { pwd2Control.setErrors(pwd2Err); }
                pwd2Control.markAsTouched();
            }
            if (Object.keys(pwdErr).length === 0) {
                pwdControl.setErrors(null);
            } else { pwdControl.setErrors(pwdErr); }
        }
        return null;
    }

    ngOnInit() {
        this.createaccountForm = new FormGroup({
            'username': new FormControl(null, [Validators.required, SignupComponent.checkLoginSpaces.bind(this)]),
            'password': new FormControl(null, [Validators.required, Validators.minLength(6)]),
            'retypedPassword': new FormControl(null, [Validators.required, Validators.minLength(6)]),
            'firstName': new FormControl(null, [Validators.required]),
            'middleInitial': new FormControl(null),
            'lastName': new FormControl(null, [Validators.required]),
            'email': new FormControl(null, [Validators.required, Validators.email]),
            'title': new FormControl(null),
            'institution': new FormControl(null),
            'department': new FormControl(null),
            'address': new FormControl(null),
            'city': new FormControl(null),
            'state': new FormControl(null),
            'zip': new FormControl(null),
            'country': new FormControl(null),
            'url': new FormControl(null),
            'biography': new FormControl(null),
            'isPublic': new FormControl(null)
        }, SignupComponent.checkPasswords.bind(this));

    }

    onSignup(form: FormGroup) {
        if (form.invalid) {
            return;
        }
        this.spinnerService.show();
        this.userService.createUser(
            form.value.username,
            form.value.password,
            form.value.retypedPassword,
            form.value.firstName,
            form.value.middleInitial,
            form.value.lastName,
            form.value.email,
            form.value.title,
            form.value.institution,
            form.value.department,
            form.value.address,
            form.value.city,
            form.value.state,
            form.value.zip,
            form.value.country,
            form.value.url,
            form.value.biography,
            this.isPublicValue
        );
    }

    setIsPublicValue(event) {
        if (event.checked === true) {
            this.isPublicValue = 1;
        } else {
            this.isPublicValue = 0;
        }
    }
}
