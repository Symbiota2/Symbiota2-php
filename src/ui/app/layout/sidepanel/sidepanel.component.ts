import {Component, OnInit, EventEmitter, Output} from '@angular/core';
import {Observable} from 'rxjs';
import {MatDialog} from '@angular/material';

import {AuthService} from 'symbiota-auth';
import {LoginComponent} from 'symbiota-auth';
import {CurrentUser} from '../../user/current-user.model';

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
    private loginDialog: any;

    constructor(
        private authService: AuthService,
        public dialog: MatDialog
    ) {}

    ngOnInit() {
        this.isLoggedIn$ = this.authService.isAuthenticated$;
        this.isLoggedOut$ = this.authService.isLoggedOut$;
        this.currentUser$ = this.authService.user$;
    }

    toggleSidenav() {
        this.sidenavToggle.emit();
    }

    openLoginDialog() {
        this.loginDialog = this.dialog.open(LoginComponent, {
            width: '450px'
        });
    }

    onLogout() {
        this.toggleSidenav();
        this.authService.logout();
    }
}
