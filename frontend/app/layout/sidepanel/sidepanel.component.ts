import {Component, OnInit, EventEmitter, Output} from '@angular/core';
import {Observable} from 'rxjs';

import {AuthService} from '../../auth/auth.service';
import {CurrentUser} from '../../auth/current-user.model';

@Component({
    selector: 'sidepanel-outlet',
    templateUrl: './sidepanel.component.html',
    styleUrls: ['./sidepanel.component.css']
})
export class SidepanelComponent implements OnInit {
    @Output() sidenavToggle = new EventEmitter<void>();
    isLoggedIn$: Observable<boolean>;
    isLoggedOut$: Observable<boolean>;
    currentUser$: Observable<CurrentUser>;

    constructor(private authService: AuthService) {}

    ngOnInit() {
        this.isLoggedIn$ = this.authService.isAuthenticated$;
        this.isLoggedOut$ = this.authService.isLoggedOut$;
        this.currentUser$ = this.authService.user$;
    }

    toggleSidenav() {
        this.sidenavToggle.emit();
    }

    onLogout() {
        this.toggleSidenav();
        this.authService.logout();
    }
}
