import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Router} from '@angular/router';
import {Subject} from 'rxjs';

import {SpinnerOverlayService} from '../shared/spinner-overlay.service';

import {environment} from '../../environments/environment';
import {AuthData} from './auth-data.model';

const BACKEND_URL = environment.apiUrl;

@Injectable({ providedIn: 'root' })
export class AuthService {
    private isAuthenticated = false;
    private token: string;
    private tokenTimer: any;
    private userId: string;
    private userName: string;
    private password: string;
    private firstName: string;
    private permissions: {};
    private authStatusListener = new Subject<boolean>();

    constructor(private http: HttpClient, private router: Router, public spinnerService: SpinnerOverlayService) {}

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

    login(username: string, password: string) {
        const authData: AuthData = { username: username, password: password };
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

    autoAuthUser() {
        const authInformation = this.getAuthData();
        if (!authInformation) {
            return;
        }
        const authData: AuthData = { username: authInformation.username, password: authInformation.password };
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
    }

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
                this.autoAuthUser();
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
