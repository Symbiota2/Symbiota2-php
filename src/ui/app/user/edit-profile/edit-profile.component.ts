import {Component, OnInit} from '@angular/core';
import {FormControl, FormGroup, Validators, FormBuilder} from '@angular/forms';

import {UserService} from '../user.service';
import {SpinnerOverlayService} from 'symbiota-shared';

@Component({
    selector: 'app-edit-profile',
    templateUrl: './edit-profile.component.html',
    styleUrls: ['./edit-profile.component.css']
})
export class EditProfileComponent implements OnInit {
    isPublicValue = 0;
    debouncer: any;
    createaccountForm: FormGroup;

    public readonlyFormControl: FormControl = new FormControl(false);

    constructor(
        public userService: UserService,
        public spinnerService: SpinnerOverlayService,
        public fb: FormBuilder
    ) {}

    static checkLoginSpaces(control: FormControl): { [s: string]: boolean } {
        if (/[^0-9A-Za-z_!@#$-+]/.test(control.value)) {
            return {'spaces': true};
        }
        return null;
    }

    static checkHumanVerified(control: FormControl): { [s: string]: boolean } {
        if (control.value === false) {
            return {'notHuman': true};
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
                    const re_num = /[0-9]/;
                    const re_letter = /[A-Za-z]/;
                    if (pwdVal.length < 6) {
                        pwdErr['minlength'] = true;
                    } else if (pwdVal.charAt(0) === ' ' || pwdVal.slice(-1) === ' ') {
                        pwdErr['spaces'] = true;
                    } else if (!re_num.test(pwdVal)) {
                        pwdErr['numbers'] = true;
                    } else if (!re_letter.test(pwdVal)) {
                        pwdErr['letters'] = true;
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
        this.createaccountForm = this.fb.group({
            'username': new FormControl(null, {
                validators: [Validators.required, EditProfileComponent.checkLoginSpaces.bind(this)],
                asyncValidators: this.checkUsername.bind(this)
            }),
            'password': new FormControl(null, [Validators.required, Validators.minLength(6)]),
            'retypedPassword': new FormControl(null, [Validators.required, Validators.minLength(6)]),
            'firstName': new FormControl(null, [Validators.required]),
            'middleInitial': new FormControl(null),
            'lastName': new FormControl(null, [Validators.required]),
            'email': new FormControl(null, {
                validators: [Validators.required, Validators.email],
                asyncValidators: this.checkEmail.bind(this)
            }),
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
            'isPublic': new FormControl(null),
            'human-entry': new FormControl(null, [Validators.required]),
            'human-verified': new FormControl(null, [Validators.required, EditProfileComponent.checkHumanVerified.bind(this)])
        }, [EditProfileComponent.checkPasswords.bind(this)]);
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

    checkUsername(control: FormControl): any {
        clearTimeout(this.debouncer);
        control.setErrors({'CheckingLogin': true});
        return new Promise(resolve => {
            this.debouncer = setTimeout(() => {
                this.userService.checkUsername(control.value).subscribe((res) => {
                    if (res.available) {
                        resolve({'LoginAlreadyUsed': true});
                    } else {
                        resolve(null);
                    }
                }, (err) => {
                    resolve(null);
                });
            }, 1000);
        });
    }

    checkEmail(control: FormControl): any {
        clearTimeout(this.debouncer);
        control.setErrors({'CheckingEmail': true});
        return new Promise(resolve => {
            this.debouncer = setTimeout(() => {
                this.userService.checkEmail(control.value).subscribe((res) => {
                    if (res.available) {
                        resolve({'EmailAlreadyUsed': true});
                    } else {
                        resolve(null);
                    }
                }, (err) => {
                    resolve(null);
                });
            }, 1000);
        });
    }

    setIsPublicValue(event) {
        if (event.checked === true) {
            this.isPublicValue = 1;
        } else {
            this.isPublicValue = 0;
        }
    }

    setHumanVerified(event) {
        this.createaccountForm.controls['human-verified'].setValue(event);
    }
}
