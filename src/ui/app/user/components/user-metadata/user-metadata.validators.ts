import {Injectable} from '@angular/core';
import {AbstractControl} from '@angular/forms';

import {UserService} from '../../services/user.service';

@Injectable({
    providedIn: 'root'
})
export class UserMetadataValidators {
    debouncer: any;

    constructor(
        public userService: UserService
    ) {}

    checkEmail(control: AbstractControl): any {
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
}
