import {Component, OnInit, OnDestroy} from '@angular/core';
import {Observable} from 'rxjs';

import {AuthService} from './auth/auth.service';
import {SessionExpireWarningDialogComponent} from './auth/session-expire-warning-dialog/session-expire-warning-dialog.component';

import {CurrentUser} from './auth/current-user.model';

@Component({
    selector: 'app-root',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit, OnDestroy {
    isLoggedIn$: Observable<boolean>;
    isLoggedOut$: Observable<boolean>;
    currentUser$: Observable<CurrentUser>;
    maintainLogin = 0;

    constructor(private authService: AuthService) {}

    ngOnInit() {
        this.isLoggedIn$ = this.authService.isAuthenticated$;
        this.isLoggedOut$ = this.authService.isLoggedOut$;
        this.currentUser$ = this.authService.user$;
        this.authService.maintainLogin$.subscribe(
            (val: number) => {
                this.maintainLogin = val;
            }
        );
        this.authService.tokenExpire$.subscribe(
            (seconds: number) => {
                if (!this.maintainLogin && seconds) {
                    this.setSessionTimers(seconds);
                }
            }
        );
    }

    private setSessionTimers(tokenExpire: number) {
        const warningTime = tokenExpire - 30;
        this.authService.setWarningTimer(warningTime, SessionExpireWarningDialogComponent);
        this.authService.setLogoutTimer(tokenExpire);
    }

    ngOnDestroy() {
        this.authService.logout();
    }
}
