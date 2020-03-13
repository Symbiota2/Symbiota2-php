import {Component, OnInit, OnDestroy} from '@angular/core';
import {TranslateService} from "@ngx-translate/core";
import {Observable} from 'rxjs';

import {SessionExpireWarningDialogComponent} from 'symbiota-auth';

import {AuthService} from 'symbiota-auth';
import {ConfigurationService} from 'symbiota-shared';

import {CurrentUser} from './user/interfaces/user.interface';

@Component({
    selector: 'app-root',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit, OnDestroy {
    maintainLogin = 0;
    tokenExpire = 0;
    selectedLanguage: string;

    constructor(
        private authService: AuthService,
        private translate: TranslateService,
        private configService: ConfigurationService
    ) {
        translate.addLangs(['ar', 'zh', 'en', 'fr', 'de', 'hi', 'it', 'ja', 'fa', 'pt', 'ru', 'es', 'ur']);
        translate.setDefaultLang('en');
        this.configService.selectedLanguageValue.subscribe(value => {
            this.selectedLanguage = value.toString();
            translate.use(this.selectedLanguage);
        });
    }

    ngOnInit() {
        this.authService.user$.subscribe(
            (user: CurrentUser) => {
                this.maintainLogin = user.maintainLogin;
                this.tokenExpire = user.tokenExpire;
                if (!this.maintainLogin && this.tokenExpire) {
                    this.setSessionTimers(this.tokenExpire);
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
