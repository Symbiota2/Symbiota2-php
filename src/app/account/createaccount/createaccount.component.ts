import {Component, OnInit} from '@angular/core';
import {FormControl, FormGroup, Validators} from "@angular/forms";
import {Observable} from "rxjs/index";

@Component({
    selector: 'createaccount-outlet',
    templateUrl: './createaccount.component.html',
    styleUrls: ['./createaccount.component.css']
})
export class CreateaccountComponent implements OnInit {

    createaccountForm: FormGroup;

    constructor() {
    }

    ngOnInit() {
        this.createaccountForm = new FormGroup({
            'username': new FormControl(null, [Validators.required, this.checkLoginSpaces.bind(this)], this.checkLogin.bind(this)),
            'password': new FormControl(null, [Validators.required, Validators.minLength(6)]),
            'c_password': new FormControl(null, [Validators.required, Validators.minLength(6)]),
            'firstname': new FormControl(null, [Validators.required]),
            'middleinitial': new FormControl(null),
            'lastname': new FormControl(null, [Validators.required]),
            'email': new FormControl(null, [Validators.required, Validators.email], this.checkEmail.bind(this)),
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
            'ispublic': new FormControl(null),
            'humanvalid': new FormControl(null, [Validators.required, this.checkHuman.bind(this)])
        }, this.checkPasswords.bind(this));

    }

    onSubmit(form: FormGroup) {

    }

    checkHuman(control: FormControl): { [s: string]: boolean } {
        if (control.value !== 'symbiota') {
            return {'NotHuman': true};
        }
        return null;
    }

    checkLoginSpaces(control: FormControl): { [s: string]: boolean } {
        if (/[^0-9A-Za-z_!@#$-+]/.test(control.value)) {
            return {'spaces': true};
        }
        return null;
    }

    checkPasswords(form: FormGroup): { [s: string]: boolean } {
        var pwdControl = form.get('password');
        var pwd2Control = form.get('c_password');
        if (pwdControl != null && pwd2Control != null && form.dirty) {
            var pwdVal = pwdControl.value;
            var pwd2Val = pwd2Control.value;
            var pwdErr = {};
            var pwd2Err = {};
            if (pwdVal !== pwd2Val) {
                pwdErr['PasswordsDoNotMatch'] = true;
                pwd2Err['PasswordsDoNotMatch'] = true;
            }
            if (pwdControl.touched) {
                if (pwdVal) {
                    if (pwdVal.length < 6) pwdErr['minlength'] = true;
                    else if (pwdVal.charAt(0) == " " || pwdVal.slice(-1) == " ") pwdErr['spaces'] = true;
                }
                else {
                    pwdErr['required'] = true;
                }
                if (Object.keys(pwdErr).length === 0) pwdControl.setErrors(null);
                else pwdControl.setErrors(pwdErr);
                pwdControl.markAsTouched();
            }
            if (pwd2Control.touched) {
                if (pwd2Val) {
                    if (pwd2Val.length < 6) pwd2Err['minlength'] = true;
                    else if (pwd2Val.charAt(0) == " " || pwd2Val.slice(-1) == " ") pwd2Err['spaces'] = true;
                }
                else {
                    pwd2Err['required'] = true;
                }
                if (Object.keys(pwd2Err).length === 0) pwd2Control.setErrors(null);
                else pwd2Control.setErrors(pwd2Err);
                pwd2Control.markAsTouched();
            }
            if (Object.keys(pwdErr).length === 0) pwdControl.setErrors(null);
            else pwdControl.setErrors(pwdErr);
        }
        return null;
    }

    checkLogin(control: FormControl): Promise<any> | Observable<any> {
        const loginpromise = new Promise<any>((resolve, reject) => {
            setTimeout(() => {
                if (control.value === 'test@test.com') {
                    resolve({'LoginAlreadyUsed': true});
                }
                else {
                    resolve(null);
                }
            }, 1500);
        });
        return loginpromise;
    }

    checkEmail(control: FormControl): Promise<any> | Observable<any> {
        const emailpromise = new Promise<any>((resolve, reject) => {
            setTimeout(() => {
                if (control.value === 'test@test.com') {
                    resolve({'EmailAlreadyUsed': true});
                }
                else {
                    resolve(null);
                }
            }, 1500);
        });
        return emailpromise;
    }

}
