import {Component} from '@angular/core';
import {Validators, FormBuilder} from '@angular/forms';

import {UserMetadataValidators} from '../../components/user-metadata/user-metadata.validators';

@Component({
    selector: 'app-edit-profile',
    templateUrl: './edit-profile.component.html',
    styleUrls: ['./edit-profile.component.css']
})
export class EditProfileComponent {
    editProfileForm = this.fb.group({
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
        public userMetadataValidator: UserMetadataValidators,
        public fb: FormBuilder
    ) {}
}
