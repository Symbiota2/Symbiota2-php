import {Component} from '@angular/core';
import {FormControl, FormGroup, Validators, FormBuilder} from '@angular/forms';

import {UserService} from '../../services/user.service';
import {CaptchaValidators} from 'symbiota-shared';
import {UserMetadataValidators} from '../../components/user-metadata/user-metadata.validators';
import {SpinnerOverlayService} from 'symbiota-shared';

@Component({
    selector: 'app-createaccount-outlet',
    templateUrl: './signup.component.html',
    styleUrls: ['./signup.component.css']
})
export class SignupComponent {
    debouncer: any;

    constructor(
        public userService: UserService,
        public userMetadataValidator: UserMetadataValidators,
        public spinnerService: SpinnerOverlayService,
        public fb: FormBuilder
    ) {}

    createaccountForm = this.fb.group({
        username_group: this.fb.group({
            username: ['', [Validators.required, SignupComponent.checkLoginSpaces.bind(this)], [this.checkUsername.bind(this)]]
        }),
        user_metadata: this.fb.group({
            firstName: ['', [Validators.required]],
            middleInitial: ['', null],
            lastName: ['', [Validators.required]],
            email: ['', [Validators.required, Validators.email], [this.userMetadataValidator.checkEmail.bind(this)] ],
            title: ['', null],
            institution: ['', null],
            department: ['', null],
            address: ['', null],
            city: ['', null],
            state: ['', null],
            zip: ['', null],
            country: ['', null],
            url: ['', null],
            biography: ['', null],
            isPublic: ['', null]
        }),
        user_password: this.fb.group({
            password: ['', [Validators.required, Validators.minLength(6)]],
            retypedPassword: ['', [Validators.required, Validators.minLength(6)]]
        }),
        captcha: this.fb.group({
            human_entry: ['', Validators.required],
            human_verified: ['', [Validators.required, CaptchaValidators.checkHuman]]
        })
    });

    static checkLoginSpaces(control: FormControl): { [s: string]: boolean } {
        if (/[^0-9A-Za-z_!@#$-+]/.test(control.value)) {
            return {'spaces': true};
        }
        return null;
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
            form.value.isPublic
        );
    }

    get usernameRequired() {
        return (
            this.createaccountForm.get('username_group.username').dirty &&
            this.required('username')
        );
    }

    get usernameSpaces() {
        return (
            this.createaccountForm.get('username_group.username').hasError('spaces') &&
            this.createaccountForm.get('username_group.username').dirty &&
            !this.required('username')
        );
    }

    get usernameCheckingLogin() {
        return (
            this.createaccountForm.get('username_group.username').hasError('CheckingLogin') &&
            this.createaccountForm.get('username_group.username').dirty &&
            !this.required('username')
        );
    }

    get usernameLoginAlreadyUsed() {
        return (
            this.createaccountForm.get('username_group.username').hasError('LoginAlreadyUsed') &&
            this.createaccountForm.get('username_group.username').dirty &&
            !this.required('username')
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

    required(name: string) {
        return (
            this.createaccountForm.get(`username_group.${name}`).hasError('required') &&
            this.createaccountForm.get(`username_group.${name}`).touched
        );
    }
}
