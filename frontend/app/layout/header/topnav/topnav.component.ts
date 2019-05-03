import {Component, OnInit, EventEmitter, Output} from '@angular/core';
import {Store} from '@ngrx/store';
import {Observable} from 'rxjs';

import * as fromRoot from '../../../app.reducer';
import {AuthService} from '../../../auth/auth.service';
import {CurrentUser} from '../../../auth/current-user.model';

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

    constructor(private store: Store<fromRoot.State>, private authService: AuthService) {}

    ngOnInit() {
        this.isLoggedIn$ = this.authService.isAuthenticated$;
        this.isLoggedOut$ = this.authService.isLoggedOut$;
        this.currentUser$ = this.authService.user$;
    }

    toggleSidenav() {
        this.sidenavToggle.emit();
    }

    onLogout() {
        this.authService.logout();
    }
}
