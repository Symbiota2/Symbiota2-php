import {Component, OnInit, EventEmitter, Output} from '@angular/core';
import {Observable} from 'rxjs';
import {TranslateService} from "@ngx-translate/core";

import {AuthService} from 'symbiota-auth';
import {PluginLinkService} from 'symbiota-plugin';
import {LoginComponentService} from 'symbiota-auth';
import {ConfigurationService} from 'symbiota-shared';

import {LinkHook} from '../../../plugin/interfaces/link-hook.interface';
import {CurrentUser} from '../../../user/interfaces/user.interface';

@Component({
    selector: 'header-topnav',
    templateUrl: './topnav.component.html',
    styleUrls: ['./topnav.component.css']
})
export class TopnavComponent implements OnInit {
    @Output() sidenavToggle = new EventEmitter<void>();

    isLoggedIn$: Observable<boolean>;
    isLoggedOut$: Observable<boolean>;
    currentUser$: Observable<CurrentUser>;
    selectedLanguage: string;
    navigationData: any;
    pluginLinksArr: LinkHook[];

    constructor(
        private authService: AuthService,
        private linkService: PluginLinkService,
        private loginComponentService: LoginComponentService,
        private translate: TranslateService,
        private configService: ConfigurationService
    ) {
        this.configService.selectedLanguageValue.subscribe(value => {
            this.selectedLanguage = value.toString();
        });

        if (configService.data && configService.data.hasOwnProperty('NAVIGATION_DATA')) {
            this.navigationData = configService.data.NAVIGATION_DATA;
        } else {
            this.pluginLinksArr = Object.assign([], this.linkService.getOutletLinks('topnav-navigation-links'));
            this.pluginLinksArr.sort((a, b) => a.index - b.index);
        }
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
        this.loginComponentService.openLoginDialog();
    }

    onLogout() {
        this.authService.logout();
    }

    useLanguage(event) {
        this.configService.setSelectedLanguage(event.value);
    }
}
