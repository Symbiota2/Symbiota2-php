import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Router, NavigationCancel} from '@angular/router';
import {Observable, BehaviorSubject} from 'rxjs';
import {filter, map} from 'rxjs/operators';
import {MatDialog} from '@angular/material';
import {TranslateService} from "@ngx-translate/core";

import {SpinnerOverlayService} from 'symbiota-shared';
import {AlertService} from 'symbiota-shared';
import {LoginComponentService} from "./login-component.service";

import {AuthData} from './auth-data.model';
import {CurrentUser} from './current-user.model';

const ANONYMOUS_USER: CurrentUser = {
    id: undefined,
    firstName: undefined,
    permissions: {},
    maintainLogin: undefined,
    tokenExpire: undefined
};

export interface ResetPassword {
    username: string;
}

export interface RetrieveLogin {
    email: string;
}

@Injectable()
export class AuthService {
    private subject = new BehaviorSubject<CurrentUser>(undefined);
    private logoutTimer: any;
    private warningTimer: any;
    private warningDialog: any;
    private username: string;
    private password: string;
    private redirectUrl = '';
    user$: Observable<CurrentUser> = this.subject.asObservable().pipe(
        filter(user => !!user)
    );
    maintainLogin$: Observable<number> = this.user$.pipe(
        map(user => user.maintainLogin)
    );
    tokenExpire$: Observable<number> = this.user$.pipe(
        map(user => user.tokenExpire)
    );
    userPermissions$: Observable<object> = this.user$.pipe(
        map(user => user.permissions)
    );
    isAuthenticated$: Observable<boolean> = this.user$.pipe(
        map(user => !!user.id)
    );
    isLoggedOut$: Observable<boolean> = this.isAuthenticated$.pipe(
        map(isAuthenticated => !isAuthenticated)
    );

    constructor(
        private http: HttpClient,
        private spinnerService: SpinnerOverlayService,
        private alertService: AlertService,
        private loginComponentService: LoginComponentService,
        public dialog: MatDialog,
        private router: Router,
        private translate: TranslateService
    ) {
        this.spinnerService.show();
        http.get<CurrentUser>('/api/users/authuser').subscribe(
            user => {
                this.subject.next(user ? user : ANONYMOUS_USER);
                this.spinnerService.hide();
                // console.log(user);
            }
        );
    }

    login(username: string, password: string, maintainLogin: number, redirect: string) {
        const authData: AuthData = { username: username, password: password, maintainLogin: maintainLogin };
        clearTimeout(this.logoutTimer);
        clearTimeout(this.warningTimer);
        this.http.post<CurrentUser>('/api/login', authData).subscribe(
            user => {
                if (!user.maintainLogin) {
                    this.username = username;
                    this.password = password;
                }
                this.subject.next(user);
                if (redirect) {
                    this.router.navigate([redirect]);
                }
                this.spinnerService.hide();
                // console.log(user);
            },
            error => {
                const errorMessage = this.translate.get('symbiota-auth.auth-service.login_failed');
                this.spinnerService.hide();
                this.alertService.showErrorSnackbar(
                    errorMessage,
                    '',
                    5000
                );
            }
        );
    }

    logout() {
        this.spinnerService.show();
        this.router.navigate(['/']);
        this.http.get('/api/logout').subscribe(
            () => {
                this.maintainLogin$ = undefined;
                this.username = '';
                this.password = '';
                clearTimeout(this.logoutTimer);
                clearTimeout(this.warningTimer);
                this.subject.next(ANONYMOUS_USER);
                this.spinnerService.hide();
            }
        );
    }

    resetPassword(username: string) {
        const resetData: ResetPassword = { username: username };
        this.http.post<any>('/api/users/resetpassword', resetData).subscribe(
            res => {
                this.spinnerService.hide();
                if (res.result) {
                    const newPasswordMessage = this.translate.get('symbiota-auth.auth-service.new_password_sent');
                    this.alertService.showSnackbar(
                        newPasswordMessage,
                        '',
                        5000
                    );
                } else {
                    const errorMessage = this.translate.get('symbiota-auth.auth-service.no_account_found');
                    this.alertService.showErrorSnackbar(
                        errorMessage,
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
                    const loginSentMessage = this.translate.get('symbiota-auth.auth-service.login_sent');
                    this.alertService.showSnackbar(
                        loginSentMessage,
                        '',
                        5000
                    );
                } else {
                    const errorMessage = this.translate.get('symbiota-auth.auth-service.no_account_found_email');
                    this.alertService.showErrorSnackbar(
                        errorMessage,
                        '',
                        5000
                    );
                }
            }
        );
    }

    setWarningTimer(duration: number, dialog: any) {
        // console.log('Setting timer: ' + duration);
        if (this.username && this.password) {
            this.warningTimer = setTimeout(() => {
                this.warningDialog = this.dialog.open(dialog, {
                    width: '450px',
                    data: {username: this.username, password: this.password}
                });
            }, duration * 1000);
        }
    }

    setLogoutTimer(duration: number) {
        // console.log('Setting timer: ' + duration);
        this.logoutTimer = setTimeout(() => {
            if (this.warningDialog) {
                this.warningDialog.close();
                this.warningDialog = '';
            }
            this.logout();
            const errorMessage = this.translate.get('symbiota-auth.auth-service.session_expired');
            this.alertService.showErrorSnackbar(
                errorMessage,
                '',
                5000
            );
        }, duration * 1000);
    }

    getCurrentPermissions() {
        let permissions = {};
        if (this.subject.getValue() && this.subject.getValue().id) {
            permissions = Object.assign({}, this.subject.getValue().permissions);
        }
        return permissions;
    }

    validatePermissions(permissions: any[]) {
        let validated = false;
        if (this.subject.getValue() && this.subject.getValue().id) {
            const currentPermissions = Object.assign({}, this.subject.getValue().permissions);
            if (currentPermissions['SuperAdmin']) {
                return true;
            } else {
                const currentPermKeys = Object.keys(currentPermissions);
                permissions.forEach((perm, index) => {
                    if (typeof perm === 'string') {
                        if (currentPermKeys.includes(perm)) {
                            validated = true;
                        }
                    }
                    if (typeof perm === 'object') {
                        const permKey = Object.keys(perm)[0];
                        const permValue = perm[permKey];
                        if (currentPermKeys.includes(permKey) && currentPermissions[permKey].includes(permValue)) {
                            validated = true;
                        }
                    }
                });
            }
        }
        return validated;
    }

    validateAccess(permissions: any[]) {
        if (this.subject.getValue() && this.subject.getValue().id) {
            let accessGranted = false;
            const currentPermissions = Object.assign({}, this.subject.getValue().permissions);
            if (currentPermissions['SuperAdmin']) {
                accessGranted = true;
                return;
            } else {
                const currentPermKeys = Object.keys(currentPermissions);
                permissions.forEach((perm, index) => {
                    if (typeof perm === 'string') {
                        if (currentPermKeys.includes(perm)) {
                            accessGranted = true;
                            return;
                        }
                    }
                    if (typeof perm === 'object') {
                        const permKey = Object.keys(perm)[0];
                        const permValue = perm[permKey];
                        if (currentPermKeys.includes(permKey) && currentPermissions[permKey].includes(permValue)) {
                            accessGranted = true;
                            return;
                        }
                    }
                });
            }
            if (accessGranted === false) {
                this.router.navigate(['/']);
            }
        } else {
            const routerSub = this.router.events.subscribe(val => {
                if (val instanceof NavigationCancel) {
                    this.redirectUrl = val.url.toString();
                }
            });
            this.router.navigate(['/']);
            this.loginComponentService.openLoginDialog(this.redirectUrl);
            routerSub.unsubscribe();
        }
    }
}
