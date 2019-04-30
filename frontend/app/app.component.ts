import {Component, OnInit} from '@angular/core';
import {Observable} from 'rxjs';

import {AuthService} from './auth/auth.service';

import {CurrentUser} from './auth/current-user.model';

@Component({
    selector: 'app-root',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
    isLoggedIn$: Observable<boolean>;
    isLoggedOut$: Observable<boolean>;
    currentUser$: Observable<CurrentUser>;

    constructor(private authService: AuthService) {}

    ngOnInit() {
        this.isLoggedIn$ = this.authService.isLoggedIn$;
        this.isLoggedOut$ = this.authService.isLoggedOut$;
        this.currentUser$ = this.authService.user$;
    }

    logout() {
        this.authService.logout().subscribe();
    }
}
