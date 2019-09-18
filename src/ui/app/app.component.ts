import {Component, OnInit, OnDestroy} from '@angular/core';
import {TranslateService} from "@ngx-translate/core";
import {Observable} from 'rxjs';

import {SessionExpireWarningDialogComponent} from 'symbiota-auth';

import {AuthService} from 'symbiota-auth';
import {ConfigurationService} from 'symbiota-shared';

import {CurrentUser} from './user/current-user.model';

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
    selectedLanguage: string;

    constructor(
        private authService: AuthService,
        private translate: TranslateService,
        private configService: ConfigurationService
    ) {
        translate.addLangs(['ar', 'zh', 'en', 'fr', 'de', 'hi', 'it', 'ja', 'fa', 'pt', 'ru', 'so', 'es', 'ur']);
        translate.setDefaultLang('en');
        this.configService.selectedLanguageValue.subscribe(value => {
            this.selectedLanguage = value.toString();
            translate.use(this.selectedLanguage);
        });
    }

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
