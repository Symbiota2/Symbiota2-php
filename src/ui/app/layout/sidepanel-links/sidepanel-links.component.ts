import {Component, OnInit, EventEmitter, Output, Input} from '@angular/core';
import {Observable} from 'rxjs';

import {AuthService} from 'symbiota-auth';
import {LoginComponentService} from 'symbiota-auth';
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

    constructor(
        private authService: AuthService,
        private loginComponentService: LoginComponentService
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
        this.toggleSidenav();
        this.loginComponentService.openLoginDialog();
    }

    onLogout() {
        this.toggleSidenav();
        this.authService.logout();
    }
}
