import {shareReplay, filter, tap, map} from 'rxjs/operators';
import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Observable, BehaviorSubject, Subscription} from 'rxjs';
import {Router} from '@angular/router';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material';

import {SpinnerOverlayService} from '../shared/spinner-overlay.service';
import {AlertService} from '../shared/alert.service';

import {AuthData} from './auth-data.model';
import {CurrentUser} from './current-user.model';

const ANONYMOUS_USER: CurrentUser = {
    id: undefined,
    firstName: undefined,
    permissions: {},
    maintainLogin: undefined,
    tokenExpire: undefined
};

@Injectable()
export class AuthService {
    private subject = new BehaviorSubject<CurrentUser>(undefined);
    private logoutTimer: any;
    private warningTimer: any;
    private warningDialog: any;
    private username: string;
    private password: string;
    user$: Observable<CurrentUser> = this.subject.asObservable().pipe(
        filter(user => !!user)
    );
    maintainLogin$: Observable<number> = this.user$.pipe(
        map(user => user.maintainLogin)
    );
    tokenExpire$: Observable<number> = this.user$.pipe(
        map(user => user.tokenExpire)
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
        private router: Router,
        public dialog: MatDialog
    ) {
        this.spinnerService.show();
        http.get<CurrentUser>('/api/authuser').subscribe(
            user => {
                this.subject.next(user ? user : ANONYMOUS_USER);
                this.spinnerService.hide();
                // console.log(user);
            }
        );
    }

    login(username: string, password: string, maintainLogin: number, redirect: string) {
        const authData: AuthData = { username: username, password: password, maintainLogin: maintainLogin };
        this.http.post<CurrentUser>('/api/login', authData).subscribe(
            user => {
                if (!user.maintainLogin) {
                    this.username = username;
                    this.password = password;
                }
                this.subject.next(user);
                this.spinnerService.hide();
                if (redirect) {
                    this.router.navigateByUrl('/');
                }
                // console.log(user);
            }
        );
    }

    logout() {
        this.http.get('/api/logout').subscribe(
            () => {
                this.maintainLogin$ = undefined;
                this.username = '';
                this.password = '';
                clearTimeout(this.logoutTimer);
                clearTimeout(this.warningTimer);
                this.subject.next(ANONYMOUS_USER);
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
            this.alertService.showSnackbar(
                'Your user session has expired',
                '',
                5000
            );
        }, duration * 1000);
    }
}
