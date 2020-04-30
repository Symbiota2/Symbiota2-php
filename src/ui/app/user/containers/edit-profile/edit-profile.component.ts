import {Component, OnInit} from '@angular/core';
import {Validators, FormBuilder} from '@angular/forms';

import {UserService} from '../../services/user.service';
import {SharedUserService} from 'symbiota-shared';
import {AuthService} from 'symbiota-auth';
import {SpinnerOverlayService} from 'symbiota-shared';

import {UserMetadataValidators} from '../../components/user-metadata/user-metadata.validators';

@Component({
    selector: 'app-edit-profile',
    templateUrl: './edit-profile.component.html',
    styleUrls: ['./edit-profile.component.css']
})
export class EditProfileComponent implements OnInit {
    userId = 0;
    maintainLogin = 0;

    editProfileForm = this.fb.group({
        oldPassword_group: this.fb.group({
            oldPassword: ['', [Validators.required, Validators.minLength(5)]]
        }),
        user_password: this.fb.group({
            password: ['', [Validators.required, Validators.minLength(6)]],
            retypedPassword: ['', [Validators.required, Validators.minLength(6)]]
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
        })
    });

    constructor(
        public userService: UserService,
        public sharedUserService: SharedUserService,
        public authService: AuthService,
        public userMetadataValidator: UserMetadataValidators,
        public fb: FormBuilder,
        public spinnerService: SpinnerOverlayService
    ) {}

    ngOnInit() {
        this.authService.user$.subscribe(value => {
            this.userId = value.id;
            if (this.userId > 0) {
                this.sharedUserService.getUserById(this.userId).subscribe( data => {
                    this.editProfileForm.get('user_metadata').patchValue(data);
                });
                this.maintainLogin = value.maintainLogin;
            }
        });
    }

    get resetPasswordErrors() {
        return (
            !this.editProfileForm.get('oldPassword_group.oldPassword').dirty ||
            this.editProfileForm.get('oldPassword_group.oldPassword').invalid ||
            !this.editProfileForm.get('user_password').dirty ||
            this.editProfileForm.get('user_password').invalid
        );
    }

    get editProfileErrors() {
        return (
            this.editProfileForm.get('user_metadata').invalid ||
            !this.editProfileForm.get('user_metadata').dirty
        );
    }

    onResetPassword() {
        if (this.resetPasswordErrors) {
            return;
        }
        const formData = {
            'maintainLogin': this.maintainLogin,
            'newPassword': this.editProfileForm.get('user_password.password').value,
            'newRetypedPassword': this.editProfileForm.get('user_password.retypedPassword').value,
            'oldPassword': this.editProfileForm.get('oldPassword_group.oldPassword').value
        };
        this.spinnerService.show();
        this.userService.resetUserPassword(formData, this.userId);
    }

    onSaveEdits() {
        if (this.editProfileErrors) {
            return;
        }
        const formData = Object.assign({},
            this.editProfileForm.get('user_metadata').value
        );
        this.spinnerService.show();
        this.userService.saveUserProfileEdits(formData, this.userId);
    }
}
