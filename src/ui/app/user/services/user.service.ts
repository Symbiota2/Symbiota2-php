import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Router} from '@angular/router';
import {map} from 'rxjs/operators';
import {TranslateService} from '@ngx-translate/core';

import {SpinnerOverlayService} from 'symbiota-shared';
import {AlertService} from 'symbiota-shared';
import {ConfigurationService} from 'symbiota-shared';

import {NewUser} from '../interfaces/user.interface';

@Injectable({
    providedIn: 'root'
})
export class UserService {

    create_confirmation: string;
    create_error: string;

    constructor(
        private http: HttpClient,
        private router: Router,
        public spinnerService: SpinnerOverlayService,
        public alertService: AlertService,
        private translate: TranslateService,
        private configService: ConfigurationService
    ) {
        this.configService.selectedLanguageValue.subscribe(value => {
            this.setTranslations();
        });
    }

    setTranslations() {
        this.translate.get('core.user.service.create_confirmation').subscribe((res: string) => {
            this.create_confirmation = res;
        });
        this.translate.get('core.user.service.create_error').subscribe((res: string) => {
            this.create_error = res;
        });
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
        const userData: NewUser = {
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
                    this.create_confirmation,
                    '',
                    5000
                );
            },
            error => {
                this.spinnerService.hide();
                this.alertService.showErrorSnackbar(
                    this.create_error,
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
