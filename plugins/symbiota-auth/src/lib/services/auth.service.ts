import {Injectable} from "@angular/core";
import {HttpClient} from "@angular/common/http";
import {Router, NavigationCancel} from "@angular/router";
import {Observable, BehaviorSubject} from "rxjs";
import {filter, map} from "rxjs/operators";
import {MatDialog} from "@angular/material";
import {TranslateService} from "@ngx-translate/core";

import {SpinnerOverlayService} from "symbiota-shared";
import {AlertService} from "symbiota-shared";
import {LoginComponentService} from "./login-component.service";

import {AuthData} from "../interfaces/auth-data.interface";
import {CurrentUser} from "../interfaces/current-user.interface";

const ANONYMOUS_USER: CurrentUser = {
    id: undefined,
    firstName: undefined,
    permissions: {},
    maintainLogin: undefined,
    tokenExpire: undefined
};

export interface ResetPassword {
    username: string;
}

export interface RetrieveLogin {
    email: string;
}

@Injectable({
    providedIn: "root",
})
export class AuthService {
    private static readonly I8N_LOGIN_FAIL = "symbiota-auth.auth-service.login_failed";
    private static readonly I8N_LOGIN_SENT = "symbiota-auth.auth-service.login_sent";
    private static readonly I8N_LOGIN_404 = "symbiota-auth.auth-service.no_account_found_email";

    private static readonly I8N_RESET_404 = "symbiota-auth.auth-service.no_account_found";
    private static readonly I8N_RESET_SUCCESS = "symbiota-auth.auth-service.new_password_sent";

    private static readonly I8N_SESSION_EXPIRED = "symbiota-auth.auth-service.session_expired";

    private static readonly PERM_SUPER_ADMIN = "SuperAdmin";

    private subject = new BehaviorSubject<CurrentUser>(undefined);
    private authenticationComplete = false;
    private logoutTimer: any;
    private warningTimer: any;
    private warningDialog: any;
    private username: string;
    private password: string;
    private redirectUrl = "";

    user$: Observable<CurrentUser> = this.subject.asObservable().pipe(
        filter(user => !!user)
    );
    isAuthenticated$: Observable<boolean> = this.user$.pipe(
        map(user => !!user.id)
    );
    isLoggedOut$: Observable<boolean> = this.isAuthenticated$.pipe(
        map(isAuthenticated => !isAuthenticated)
    );

    login_failed: string;
    login_sent: string;
    new_password_sent: string;
    no_account_found: string;
    no_account_found_email: string;
    session_expired: string;

    constructor(
        private http: HttpClient,
        private spinnerService: SpinnerOverlayService,
        private alertService: AlertService,
        private loginComponentService: LoginComponentService,
        public dialog: MatDialog,
        private router: Router,
        private translate: TranslateService
    ) {
        this.spinnerService.show();
        this.authenticateCurrentUser();
    }

    private showSnackbar(text: string, isError = false) {
        if (isError) {
            this.alertService.showErrorSnackbar(text, "", 5000);
        }
        else {
            this.alertService.showSnackbar(text, "", 5000);
        }
    }

    authenticateCurrentUser() {
        this.http.get<CurrentUser>("/api/users/authuser").subscribe(
            this.onUserAuthenticated);
    }

    private onUserAuthenticated(user: CurrentUser) {
        this.subject.next(user ? user : ANONYMOUS_USER);
        this.authenticationComplete = true;
        this.spinnerService.hide();
    }

    login(username: string, password: string, maintainLogin: number, redirect: string) {
        const authData: AuthData = { username, password, maintainLogin };
        clearTimeout(this.logoutTimer);
        clearTimeout(this.warningTimer);

        this.http.post<CurrentUser>("/api/login", authData).subscribe(
            (user) => this.onLoginSuccess(user, authData, redirect),
            this.onLoginFailure
        );
    }

    private onLoginSuccess(user: CurrentUser, authData: AuthData, redirect: string) {
        if (!user.maintainLogin) {
            this.username = authData.username;
            this.password = authData.password;
        }

        this.subject.next(user);
        this.authenticationComplete = true;
        if (redirect) {
            this.router.navigate([redirect]).then(() => {});
        }

        this.spinnerService.hide();
    }

    private onLoginFailure() {
        this.translate.get(AuthService.I8N_LOGIN_FAIL)
            .subscribe((text: string) => {
                this.spinnerService.hide();
                this.showSnackbar(text, true);
            });
    }

    async logout() {
        this.spinnerService.show();
        await this.router.navigate(["/"]);
        this.http.get("/api/logout").subscribe(this.onLogout);
    }

    private onLogout() {
        this.username = "";
        this.password = "";
        clearTimeout(this.logoutTimer);
        clearTimeout(this.warningTimer);
        this.subject.next(ANONYMOUS_USER);
        this.authenticationComplete = false;
        this.spinnerService.hide();
    }

    resetPassword(username: string) {
        const resetData: ResetPassword = { username: username };
        this.http.post<any>("/api/users/resetpassword", resetData)
            .subscribe((res) => {
                this.spinnerService.hide();

                if (res.result) {
                    this.onPasswordResetSuccess();
                } else {
                    this.onPasswordResetFailure();
                }
            });
    }

    private onPasswordResetSuccess() {
        this.translate.get(AuthService.I8N_RESET_SUCCESS)
            .subscribe(this.showSnackbar);
    }

    private onPasswordResetFailure() {
        this.translate.get(AuthService.I8N_RESET_404)
            .subscribe((text: string) => {
                this.showSnackbar(text, true);
            });
    }

    retrieveLogin(email: string) {
        const retrieveData: RetrieveLogin = { email: email };
        this.http.post<any>("/api/users/retrievelogin", retrieveData).subscribe(
            res => {
                this.spinnerService.hide();

                if (res.result) {
                    this.onRetrieveLoginSuccess();
                } else {
                    this.onRetrieveLoginFailure();
                }
            }
        );
    }

    onRetrieveLoginSuccess() {
        this.translate.get(AuthService.I8N_LOGIN_SENT)
            .subscribe(this.showSnackbar);
    }

    onRetrieveLoginFailure() {
        this.translate.get(AuthService.I8N_LOGIN_404)
            .subscribe((text: string) => {
                this.showSnackbar(text, true);
            });
    }

    setWarningTimer(duration: number, dialog: any) {
        if (this.username && this.password) {
            this.warningTimer = setTimeout(() => {
                this.warningDialog = this.dialog.open(dialog, {
                    width: "450px",
                    data: {username: this.username, password: this.password}
                });
            }, duration * 1000);
        }
    }

    setLogoutTimer(duration: number) {
        this.logoutTimer = setTimeout(async () => {
            if (this.warningDialog) {
                this.warningDialog.close();
                this.warningDialog = "";
            }

            await this.logout();

            this.translate.get(AuthService.I8N_SESSION_EXPIRED)
                .subscribe((text: string) => this.showSnackbar(text, true));

        }, duration * 1000);
    }

    getCurrentId() {
        let id = 0;
        if (this.subject.getValue() && this.subject.getValue().id) {
            id = this.subject.getValue().id;
        }
        return id;
    }

    getCurrentPermissions() {
        let permissions = {};
        if (this.subject.getValue() && this.subject.getValue().id) {
            permissions = Object.assign({}, this.subject.getValue().permissions);
        }
        return permissions;
    }

    validatePermissions(permissions: any[]) {
        if (this.authenticationComplete) {
            return this.performPermissionValidation(permissions);
        } else {
            this.http.get<CurrentUser>("/api/users/authuser")
                .subscribe((user) => {
                    this.subject.next(user ? user : ANONYMOUS_USER);
                    this.authenticationComplete = true;
                    return this.performPermissionValidation(permissions);
                });
        }
    }

    performPermissionValidation(requestedPermissions: any[]) {
        let isValidated = false;
        const hasSubject = this.getCurrentId() !== 0;

        if (hasSubject) {
            const userPermissions = Object.assign(
                {},
                this.subject.getValue().permissions
            );

            if (userPermissions[AuthService.PERM_SUPER_ADMIN]) {
                return true;
            }
            else {
                const userPermKeys = Object.keys(userPermissions);

                requestedPermissions.forEach((perm) => {
                    const permissionType = typeof perm;

                    if (permissionType === "string") {
                        if (userPermKeys.includes(perm)) {
                            isValidated = true;
                        }
                    }
                    if (permissionType === "object") {
                        const permKey = Object.keys(perm)[0];
                        const permValue = perm[permKey];

                        const hasPermissionKey = userPermKeys.includes(permKey);

                        const permissionValueMatches = (
                            userPermissions[permKey].includes(permValue)
                        );

                        isValidated = (
                            hasPermissionKey && permissionValueMatches
                        );
                    }
                });
            }
        }

        return isValidated;
    }

    validateAccess(permissions: any[]) {
        if (this.authenticationComplete) {
            this.performAccessValidation(permissions);
        } else {
            this.http.get<CurrentUser>("/api/users/authuser").subscribe(
                user => {
                    this.subject.next(user ? user : ANONYMOUS_USER);
                    this.authenticationComplete = true;
                    this.performAccessValidation(permissions);
                }
            );
        }
    }

    performAccessValidation(requestedPermissions: any[]) {
        const hasSubject = this.getCurrentId() !== 0;

        if (hasSubject) {
            let accessGranted = false;

            const userPermissions = { ...this.subject.getValue().permissions };
            const isSuperUser = userPermissions[AuthService.PERM_SUPER_ADMIN];

            if (isSuperUser) {
                accessGranted = true;
            }
            else {
                const userPermKeys = Object.keys(userPermissions);
                requestedPermissions.forEach((perm) => {
                    const permissionType = typeof perm;

                    if (permissionType === "string") {
                        accessGranted = userPermKeys.includes(perm);
                    }

                    if (permissionType === "object") {
                        const permKey = Object.keys(perm)[0];
                        const permValue = perm[permKey];

                        const hasPermissionKey = userPermKeys.includes(permKey);

                        const permissionValueMatches = (
                            userPermissions[permKey].includes(permValue)
                        );

                        accessGranted = (
                            hasPermissionKey && permissionValueMatches
                        );
                    }
                });
            }

            if (!accessGranted) {
                this.router.navigate(["/"]);
            }
        }
        else {
            const afterNavigate = this.router.events
                .subscribe((routerEvent) => {
                    if (routerEvent instanceof NavigationCancel) {
                        this.redirectUrl = routerEvent.url.toString();
                    }
                });

            this.router.navigate(["/"]).then(() => {
                this.loginComponentService.openLoginDialog(this.redirectUrl);
                afterNavigate.unsubscribe();
            });
        }
    }
}
