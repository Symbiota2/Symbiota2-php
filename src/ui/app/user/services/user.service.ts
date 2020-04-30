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
    reset_password_success: string;
    save_edits_confirmation: string;
    save_edits_error: string;
    errorResponse = {};

    constructor(
        private http: HttpClient,
        private router: Router,
        public spinnerService: SpinnerOverlayService,
        public alertService: AlertService,
        private translate: TranslateService,
        private configService: ConfigurationService
    ) {
        this.configService.selectedLanguageValue.subscribe(() => {
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
        this.translate.get('core.user.service.reset_password_success').subscribe((res: string) => {
            this.reset_password_success = res;
        });
        this.translate.get('core.user.service.save_edits_success').subscribe((res: string) => {
            this.save_edits_confirmation = res;
        });
        this.translate.get('core.user.service.save_edits_error').subscribe((res: string) => {
            this.save_edits_error = res;
        });
        this.translate.get('core.user.service.reset_password_error_response1').subscribe((res: string) => {
            this.errorResponse['errorRes1'] = res;
        });
    }

    createUser(user: NewUser) {
        this.http.post('/api/users', user).subscribe(
            () => {
                this.spinnerService.hide();
                this.router.navigate(['/']).then(() => {
                    this.alertService.showSnackbar(
                        this.create_confirmation,
                        '',
                        5000
                    );
                });
            },
            () => {
                this.spinnerService.hide();
                this.alertService.showErrorSnackbar(
                    this.create_error,
                    '',
                    5000
                );
            }
        );
    }

    saveUserProfileEdits(data: any, id: number) {
        this.http.put('/api/users/' + id, data).subscribe(
            () => {
                this.spinnerService.hide();
                this.alertService.showSnackbar(
                    this.save_edits_confirmation,
                    '',
                    5000
                );
            },
            () => {
                this.spinnerService.hide();
                this.alertService.showErrorSnackbar(
                    this.save_edits_error,
                    '',
                    5000
                );
            }
        );
    }

    resetUserPassword(data: any, id: number) {
        this.http.put('/api/users/' + id + '/changepassword', data).subscribe(
            (res) => {
                if(res > 0) {
                    this.spinnerService.hide();
                    const responseLabel = 'errorRes' + res;
                    this.alertService.showErrorSnackbar(
                        this.errorResponse[responseLabel],
                        '',
                        5000
                    );
                } else {
                    this.spinnerService.hide();
                    this.alertService.showSnackbar(
                        this.reset_password_success,
                        '',
                        5000
                    );
                }
            },
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
