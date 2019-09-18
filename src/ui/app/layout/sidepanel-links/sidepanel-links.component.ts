import {Component, OnInit, EventEmitter, Output, Input} from '@angular/core';
import {Observable} from 'rxjs';
import {TranslateService} from "@ngx-translate/core";

import {AuthService} from 'symbiota-auth';
import {LoginComponentService} from 'symbiota-auth';
import {ConfigurationService} from 'symbiota-shared';

import {CurrentUser} from '../../user/current-user.model';

@Component({
    selector: 'app-sidepanel-links',
    templateUrl: './sidepanel-links.component.html',
    styleUrls: ['./sidepanel-links.component.css']
})
export class SidepanelLinksComponent implements OnInit {
    @Input() fullWindow: boolean;
    @Output() sidenavToggle = new EventEmitter<void>();

    isLoggedIn$: Observable<boolean>;
    isLoggedOut$: Observable<boolean>;
    currentUser$: Observable<CurrentUser>;
    selectedLanguage: string;

    constructor(
        private authService: AuthService,
        private loginComponentService: LoginComponentService,
        private translate: TranslateService,
        private configService: ConfigurationService
    ) {
        this.configService.selectedLanguageValue.subscribe(value => {
            this.selectedLanguage = value.toString();
        });
    }

    ngOnInit() {
        this.isLoggedIn$ = this.authService.isAuthenticated$;
        this.isLoggedOut$ = this.authService.isLoggedOut$;
        this.currentUser$ = this.authService.user$;
    }

    toggleSidenav() {
        this.sidenavToggle.emit();
    }

    onLogin() {
        this.toggleSidenav();
        this.loginComponentService.openLoginDialog();
    }

    onLogout() {
        this.toggleSidenav();
        this.authService.logout();
    }

    useLanguage(event) {
        this.configService.setSelectedLanguage(event.value);
    }
}
