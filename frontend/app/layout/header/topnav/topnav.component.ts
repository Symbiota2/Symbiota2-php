import {Component, OnInit, OnDestroy, EventEmitter, Output} from '@angular/core';
import {Store} from '@ngrx/store';
import {Subscription} from 'rxjs';

import * as fromRoot from '../../../app.reducer';
import {AuthService} from '../../../auth/auth.service';

@Component({
    selector: 'header-topnav',
    templateUrl: './topnav.component.html',
    styleUrls: ['./topnav.component.css']
})
export class TopnavComponent implements OnInit, OnDestroy {
    @Output() sidenavToggle = new EventEmitter<void>();
    isAuth = false;
    firstName = '';
    private authListener: Subscription;

    constructor(private store: Store<fromRoot.State>, private authService: AuthService) {}

    ngOnInit() {
        this.isAuth = this.authService.getIsAuth();
        this.authListener = this.authService
            .getAuthStatusListener()
            .subscribe(isAuthenticated => {
                this.isAuth = isAuthenticated;
                this.firstName = localStorage.getItem('firstName');
            });
    }

    toggleSidenav() {
        this.sidenavToggle.emit();
    }

    onLogout() {
        this.authService.logout();
    }

    ngOnDestroy() {
        this.authListener.unsubscribe();
    }
}
