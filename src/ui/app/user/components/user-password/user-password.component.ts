import {Component, Input} from '@angular/core';
import {FormGroup} from '@angular/forms';
import {TranslateService} from '@ngx-translate/core';

import {ConfigurationService} from 'symbiota-shared';

@Component({
    selector: 'app-user-password',
    templateUrl: './user-password.component.html',
    styleUrls: ['./user-password.component.css'],
})
export class UserPasswordComponent {
    @Input() parent: FormGroup;
    @Input() reset: boolean;

    passwordText: string;
    retypedPasswordText: string;
    retypedPasswordHint: string;

    constructor(
        private translate: TranslateService,
        private configService: ConfigurationService
    ) {
        this.configService.selectedLanguageValue.subscribe(() => {
            this.setTranslations();
        });
    }

    setTranslations() {
        if (!this.reset) {
            this.translate.get('core.user.user_password.new_password_box').subscribe((res: string) => {
                this.passwordText = res;
            });
            this.translate.get('core.user.user_password.new_password_again_box').subscribe((res: string) => {
                this.retypedPasswordText = res;
            });
            this.translate.get('core.user.user_password.new_password_again_hint').subscribe((res: string) => {
                this.retypedPasswordHint = res;
            });
        } else {
            this.translate.get('core.user.user_password.reset_password_box').subscribe((res: string) => {
                this.passwordText = res;
            });
            this.translate.get('core.user.user_password.reset_password_again_box').subscribe((res: string) => {
                this.retypedPasswordText = res;
            });
            this.translate.get('core.user.user_password.reset_password_again_hint').subscribe((res: string) => {
                this.retypedPasswordHint = res;
            });
        }
    }

    get passwordRequired() {
        return (
            this.parent.get('user_password.password').dirty &&
            this.required('password')
        );
    }

    get passwordLength() {
        return (
            this.parent.get('user_password.password').hasError('minlength') &&
            this.parent.get('user_password.password').dirty &&
            !this.required('password')
        );
    }

    get passwordSpace() {
        return (
            this.parent.get('user_password.password').hasError('spaces') &&
            this.parent.get('user_password.password').dirty &&
            !this.required('password')
        );
    }

    get passwordNumber() {
        return (
            this.parent.get('user_password.password').hasError('numbers') &&
            this.parent.get('user_password.password').dirty &&
            !this.required('password')
        );
    }

    get passwordLetter() {
        return (
            this.parent.get('user_password.password').hasError('letters') &&
            this.parent.get('user_password.password').dirty &&
            !this.required('password')
        );
    }

    get passwordMatch() {
        return (
            this.parent.get('user_password.password').hasError('PasswordsDoNotMatch') &&
            this.parent.get('user_password.password').dirty &&
            !this.required('password')
        );
    }

    get retypedPasswordRequired() {
        return (
            this.parent.get('user_password.retypedPassword').dirty &&
            this.required('retypedPassword')
        );
    }

    get retypedPasswordLength() {
        return (
            this.parent.get('user_password.retypedPassword').hasError('minlength') &&
            this.parent.get('user_password.retypedPassword').dirty &&
            !this.required('retypedPassword')
        );
    }

    get retypedPasswordSpace() {
        return (
            this.parent.get('user_password.retypedPassword').hasError('spaces') &&
            this.parent.get('user_password.retypedPassword').dirty &&
            !this.required('retypedPassword')
        );
    }

    get retypedPasswordNumber() {
        return (
            this.parent.get('user_password.retypedPassword').hasError('numbers') &&
            this.parent.get('user_password.retypedPassword').dirty &&
            !this.required('retypedPassword')
        );
    }

    get retypedPasswordLetter() {
        return (
            this.parent.get('user_password.retypedPassword').hasError('letters') &&
            this.parent.get('user_password.retypedPassword').dirty &&
            !this.required('retypedPassword')
        );
    }

    required(name: string) {
        return (
            this.parent.get(`user_password.${name}`).hasError('required') &&
            this.parent.get(`user_password.${name}`).touched
        );
    }

    checkPasswords() {
        if (this.parent.get('user_password.password').dirty && this.parent.get('user_password.retypedPassword').dirty) {
            const pwdVal = this.parent.get('user_password.password').value;
            const pwd2Val = this.parent.get('user_password.retypedPassword').value;
            const pwdErr = {};
            const pwd2Err = {};

            if (pwdVal !== pwd2Val) {
                pwdErr['PasswordsDoNotMatch'] = true;
                pwd2Err['PasswordsDoNotMatch'] = true;
            }

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
            }

            if (Object.keys(pwdErr).length === 0) {
                this.parent.get('user_password.password').setErrors(null);
            } else {
                this.parent.get('user_password.password').setErrors(pwdErr);
            }

            if (pwd2Val) {
                if (pwd2Val.length < 6) {
                    pwd2Err['minlength'] = true;
                } else if (pwd2Val.charAt(0) === ' ' || pwd2Val.slice(-1) === ' ') {
                    pwd2Err['spaces'] = true;
                }
            }

            if (Object.keys(pwd2Err).length === 0) {
                this.parent.get('user_password.retypedPassword').setErrors(null);
            } else {
                this.parent.get('user_password.retypedPassword').setErrors(pwd2Err);
            }

            if (Object.keys(pwdErr).length === 0) {
                this.parent.get('user_password.password').setErrors(null);
            } else {
                this.parent.get('user_password.password').setErrors(pwdErr);
            }
        }
    }
}
