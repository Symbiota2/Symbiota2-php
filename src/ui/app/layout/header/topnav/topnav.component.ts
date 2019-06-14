import {Component, OnInit, EventEmitter, Output} from '@angular/core';
import {Observable} from 'rxjs';
import {MatDialog} from '@angular/material';

import {AuthService} from 'symbiota-auth';
import {CurrentUser} from '../../../user/current-user.model';
import {LoginComponent} from 'symbiota-auth';

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
        this.authService.logout();
    }
}
