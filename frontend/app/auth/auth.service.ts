import {shareReplay, filter, tap, map} from 'rxjs/operators';
import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Observable, BehaviorSubject} from 'rxjs';

import {SpinnerOverlayService} from '../shared/spinner-overlay.service';

import {environment} from '../../environments/environment';
import {AuthData} from './auth-data.model';
import {CurrentUser} from './current-user.model';

const BACKEND_URL = environment.apiUrl;
const ANONYMOUS_USER: CurrentUser = {
    id: undefined,
    firstName: undefined,
    permissions: {},
    maintainLogin: undefined,
    tokenExpire: undefined
};

@Injectable()
export class AuthService {
    private subject = new BehaviorSubject<CurrentUser>(undefined);
    currentUser$: Observable<CurrentUser> = this.subject.asObservable().pipe(
        filter(currentUser => !!currentUser)
    );
    isLoggedIn$: Observable<boolean> = this.currentUser$.pipe(
        map(currentUser => !!currentUser.id)
    );
    isLoggedOut$: Observable<boolean> = this.isLoggedIn$.pipe(
        map(isLoggedIn => !isLoggedIn)
    );

    // constructor(private http: HttpClient, private router: Router, public spinnerService: SpinnerOverlayService) {}

    constructor(private http: HttpClient) {
        http.get<CurrentUser>('/api/user').pipe(
            tap(console.log)
        ).subscribe(
            currentUser => this.subject.next(currentUser ? currentUser : ANONYMOUS_USER)
        );
    }

    getToken() {
        return this.token;
    }

    getIsAuth() {
        return this.isAuthenticated;
    }

    getUserId() {
        return this.userId;
    }

    getAuthStatusListener() {
        return this.authStatusListener.asObservable();
    }

    login(username: string, password: string, maintainLogin: number) {
        const authData: AuthData = { username: username, password: password, maintainLogin: maintainLogin };
        this.clearAuthData();
        this.http
            .post<{ token: string
                    id: string,
                    firstName: string,
                    permissions: {}
                }>(
                BACKEND_URL + '/login',
                authData
            )
            .subscribe(
                response => {
                    const token = response.token;
                    this.token = token;
                    if (token) {
                        const expiresInDuration = 14400;
                        this.isAuthenticated = true;
                        this.setAuthTimer(expiresInDuration);
                        this.userName = username;
                        this.password = password;
                        this.userId = String(response.id);
                        this.firstName = response.firstName;
                        this.permissions = response.permissions;
                        this.authStatusListener.next(true);
                        this.saveAuthData();
                        this.spinnerService.hide();
                        this.router.navigate(['/']);
                    }
                },
                error => {
                    this.authStatusListener.next(false);
                }
            );
    }

    /*autoAuthUser() {
        const authInformation = this.getAuthData();
        if (!authInformation) {
            return;
        }
        const authData: AuthData = { username: username, password: password, maintainLogin: maintainLogin };
        this.http
            .post<{ token: string, user: {} }>(
                BACKEND_URL + '/login',
                authData
            )
            .subscribe(
                response => {
                    const token = response.token;
                    this.token = token;
                    if (token) {
                        const user = response.user;
                        const expiresInDuration = 14400;
                        this.isAuthenticated = true;
                        this.setAuthTimer(expiresInDuration);
                        this.userName = authInformation.username;
                        this.password = authInformation.password;
                        this.userId = authInformation.userId;
                        this.firstName = authInformation.firstName;
                        this.permissions = authInformation.permissions;
                        this.authStatusListener.next(true);
                        this.saveAuthData();
                    }
                },
                error => {
                    this.authStatusListener.next(false);
                }
            );
    }*/

    logout() {
        this.clearAuthData();
        this.token = '';
        this.userId = '';
        this.userName = '';
        this.password = '';
        this.firstName = '';
        this.permissions = {};
        this.isAuthenticated = false;
        this.authStatusListener.next(false);
        clearTimeout(this.tokenTimer);
        this.router.navigate(['/']);
    }

    private setAuthTimer(duration: number) {
        // console.log('Setting timer: ' + duration);
        this.tokenTimer = setTimeout(() => {
            this.logout();
            if (this.isAuthenticated) {
                // this.autoAuthUser();
            }
        }, duration * 1000);
    }

    private saveAuthData() {
        localStorage.setItem('username', this.userName);
        localStorage.setItem('password', this.password);
        localStorage.setItem('token', this.token);
        localStorage.setItem('userId', this.userId);
        localStorage.setItem('firstName', this.firstName);
        localStorage.setItem('permissions', JSON.stringify(this.permissions));
    }

    private clearAuthData() {
        localStorage.removeItem('username');
        localStorage.removeItem('password');
        localStorage.removeItem('token');
        localStorage.removeItem('userId');
        localStorage.removeItem('firstName');
        localStorage.removeItem('permissions');
    }

    private getAuthData() {
        const token = localStorage.getItem('token');
        if (!token) {
            return;
        }
        return {
            token: token,
            username: localStorage.getItem('username'),
            password: localStorage.getItem('password'),
            userId: localStorage.getItem('userId'),
            firstName: localStorage.getItem('firstName'),
            permissions: localStorage.getItem('permissions')
        };
    }
}
