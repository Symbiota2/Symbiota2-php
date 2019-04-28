import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Router} from '@angular/router';
import {Subject} from 'rxjs';

import {SpinnerOverlayService} from '../shared/spinner-overlay.service';

import {environment} from '../../environments/environment';
import {UserData} from './user.model';

const BACKEND_URL = environment.apiUrl;

@Injectable({
    providedIn: 'root'
})
export class UserService {

    constructor(private http: HttpClient, private router: Router, public spinnerService: SpinnerOverlayService) {
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
        const userData: UserData = {
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
        this.http.post(BACKEND_URL + '/users', userData).subscribe(
            () => {
                this.spinnerService.hide();
                this.router.navigate(['/']);
            },
            error => {
                console.log(error);
            }
        );
    }
}
