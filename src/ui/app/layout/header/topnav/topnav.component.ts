import {Component, OnInit, EventEmitter, Output} from '@angular/core';
import {Observable} from 'rxjs';
import {TranslateService} from "@ngx-translate/core";

import {AuthService} from 'symbiota-auth';
import {LoginComponentService} from 'symbiota-auth';
import {CurrentUser} from '../../../user/current-user.model';

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

    constructor(
        private authService: AuthService,
        private loginComponentService: LoginComponentService,
        private translate: TranslateService
    ) {}

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
        this.translate.use(event.value);
    }
}
