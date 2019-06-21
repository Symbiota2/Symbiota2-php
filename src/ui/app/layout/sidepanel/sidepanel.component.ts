import {Component, OnInit, EventEmitter, Output, Input} from '@angular/core';
import {Observable} from 'rxjs';

import {AuthService} from 'symbiota-auth';
import {CurrentUser} from '../../user/current-user.model';

@Component({
    selector: 'sidepanel-outlet',
    templateUrl: './sidepanel.component.html',
    styleUrls: ['./sidepanel.component.css']
})
export class SidepanelComponent implements OnInit {
    @Input() fullWindow: boolean;
    @Output() sidenavToggle = new EventEmitter<void>();

    isLoggedIn$: Observable<boolean>;
    isLoggedOut$: Observable<boolean>;
    currentUser$: Observable<CurrentUser>;

    constructor(
        private authService: AuthService
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
        this.authService.openLoginDialog();
    }

    onLogout() {
        this.toggleSidenav();
        this.authService.logout();
    }
}
