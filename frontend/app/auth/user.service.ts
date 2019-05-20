import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Router} from '@angular/router';
import {Subject} from 'rxjs';

import {SpinnerOverlayService} from '../shared/spinner-overlay.service';
import {AlertService} from '../shared/alert.service';

import {User} from './user.model';
import {map} from 'rxjs/operators';

export interface ResetPassword {
    username: string;
}

export interface RetrieveLogin {
    email: string;
}

@Injectable({
    providedIn: 'root'
})
export class UserService {

    constructor(
        private http: HttpClient, private router: Router,
        public spinnerService: SpinnerOverlayService,
        public alertService: AlertService
    ) {
    }

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
                this.spinnerService.hide();
                this.router.navigate(['/']);
                this.alertService.showSnackbar(
                    'An email confirmation was sent to the address you provided. ' +
                    'Please follow the link in that email to activate your account.',
                    '',
                    5000
                );
            },
            error => {
                this.spinnerService.hide();
                this.alertService.showSnackbar(
                    'There was an error with creating your account. ',
                    '',
                    5000
                );
            }
        );
    }

    resetPassword(username: string) {
        const resetData: ResetPassword = { username: username };
        this.http.post<any>('/api/users/resetpassword', resetData).subscribe(
            res => {
                this.spinnerService.hide();
                if (res.result) {
                    this.alertService.showSnackbar(
                        'A new password has been emailed to you. ',
                        '',
                        5000
                    );
                } else {
                    this.alertService.showSnackbar(
                        'Could not locate your account from the login provided. ',
                        '',
                        5000
                    );
                }
            }
        );
    }

    retrieveLogin(email: string) {
        const retrieveData: RetrieveLogin = { email: email };
        this.http.post<any>('/api/users/retrievelogin', retrieveData).subscribe(
            res => {
                this.spinnerService.hide();
                if (res.result) {
                    this.alertService.showSnackbar(
                        'Your login has been emailed to you. ',
                        '',
                        5000
                    );
                } else {
                    this.alertService.showSnackbar(
                        'A user account could not be found asociated with email provided. ',
                        '',
                        5000
                    );
                }
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
