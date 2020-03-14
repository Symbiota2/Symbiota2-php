import {Component, Input} from '@angular/core';
import {FormGroup} from '@angular/forms';

@Component({
    selector: 'app-user-metadata',
    templateUrl: './user-metadata.component.html',
    styleUrls: ['./user-metadata.component.css'],
})
export class UserMetadataComponent {
    @Input() parent: FormGroup;

    get firstNameRequired() {
        return (
            this.parent.get('user_metadata.firstName').dirty &&
            this.required('firstName')
        );
    }

    get lastNameRequired() {
        return (
            this.parent.get('user_metadata.lastName').dirty &&
            this.required('lastName')
        );
    }

    get emailRequired() {
        return (
            this.parent.get('user_metadata.email').dirty &&
            this.required('email')
        );
    }

    get emailInvalid() {
        return (
            this.parent.get('user_metadata.email').hasError('email') &&
            this.parent.get('user_metadata.email').dirty &&
            !this.required('email')
        );
    }

    get emailCheckingEmail() {
        return (
            this.parent.get('user_metadata.email').hasError('CheckingEmail') &&
            this.parent.get('user_metadata.email').dirty &&
            !this.required('email')
        );
    }

    get emailEmailAlreadyUsed() {
        return (
            this.parent.get('user_metadata.email').hasError('EmailAlreadyUsed') &&
            this.parent.get('user_metadata.email').dirty &&
            !this.required('email')
        );
    }

    get isPublicValue() {
        return this.parent.get('user_metadata.isPublic').value === 1;
    }

    setIsPublicValue(event) {
        if (event.checked === true) {
            this.parent.get('user_metadata.isPublic').setValue(1);
        } else {
            this.parent.get('user_metadata.isPublic').setValue(0);
        }
    }

    required(name: string) {
        return (
            this.parent.get(`user_metadata.${name}`).hasError('required') &&
            this.parent.get(`user_metadata.${name}`).touched
        );
    }
}
