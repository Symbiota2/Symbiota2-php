import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Router} from '@angular/router';
import {map} from 'rxjs/operators';
import {TranslateService} from "@ngx-translate/core";

import {SpinnerOverlayService} from 'symbiota-shared';
import {AlertService} from 'symbiota-shared';

import {User} from './user.model';

@Injectable({
    providedIn: 'root'
})
export class UserService {

    constructor(
        private http: HttpClient,
        private router: Router,
        public spinnerService: SpinnerOverlayService,
        public alertService: AlertService,
        private translate: TranslateService
    ) {}

    createUser(
        username: string,
        password: string,
        retypedPassword: string,
        firstName: string,
        middleInitial: string,
        lastName: string,
        email: string,
        title: string,
        institution: string,
        department: string,
        address: string,
        city: string,
        state: string,
        zip: string,
        country: string,
        url: string,
        biography: string,
        isPublic: number
    ) {
        const userData: User = {
            username: username,
            password: password,
            retypedPassword: retypedPassword,
            firstName: firstName,
            middleInitial: middleInitial,
            lastName: lastName,
            email: email,
            title: title,
            institution: institution,
            department: department,
            address: address,
            city: city,
            state: state,
            zip: zip,
            country: country,
            url: url,
            biography: biography,
            isPublic: isPublic
        };
        this.http.post('/api/users', userData).subscribe(
            () => {
                const confirmationMessage = this.translate.get('core.user.service.create_confirmation');
                this.spinnerService.hide();
                this.router.navigate(['/']);
                this.alertService.showSnackbar(
                    confirmationMessage,
                    '',
                    5000
                );
            },
            error => {
                const errorMessage = this.translate.get('core.user.service.create_error');
                this.spinnerService.hide();
                this.alertService.showErrorSnackbar(
                    errorMessage,
                    '',
                    5000
                );
            }
        );
    }

    checkUsername(username) {
        return this.http.get<any>('/api/users/checkusername/' + username).pipe(
            map(res => res)
        );
    }

    checkEmail(email) {
        return this.http.get<any>('/api/users/checkemail/' + email).pipe(
            map(res => res)
        );
    }
}
