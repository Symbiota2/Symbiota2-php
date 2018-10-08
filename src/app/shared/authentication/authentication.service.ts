import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { Observable } from "rxjs";
import { AuthService } from 'ngx-auth';
import { map, switchMap, tap, catchError } from "rxjs/operators";
import { TokenStorage } from './token-storage.service';
import { EnvironmentService } from "../environment";

interface AccessData {
  access_token: string;
  refresh_token: string;
}

@Injectable()
export class AuthenticationService implements AuthService {
  
  constructor(
    private http: HttpClient,
    private tokenStorage: TokenStorage,
    private environmentService: EnvironmentService
  ) {}

  /**
   * Check, if user already authorized.
   * @description Should return Observable with true or false values
   * @returns {Observable<boolean>}
   * @memberOf AuthService
   */
  public isAuthorized(): Observable<boolean> {
    return this.tokenStorage
      .getAccessToken()
      .pipe(map(token => !!token));
  }

  /**
   * Get access token
   * @description Should return access token in Observable from e.g.
   * localStorage
   * @returns {Observable<string>}
   */
  public getAccessToken(): Observable<string> {
    return this.tokenStorage.getAccessToken();
  }

  /**
   * Function, that should perform refresh token verifyTokenRequest
   * @description Should be successfully completed so interceptor
   * can execute pending requests or retry original one
   * @returns {Observable<any>}
   */
  public refreshToken(): Observable<any> {
    var service = this.environmentService.setAuthService('oauth/token/refresh');
    return this.tokenStorage
      .getRefreshToken()
      .pipe(switchMap((refreshToken: string) => {
        return this.http.post(service, { refreshToken });
        }),
        tap(this.saveAccessData.bind(this)),
        catchError((err) => {
          this.logout();
          return Observable.throw(err);
        }));
  }

  /**
   * Function, checks response of failed request to determine,
   * whether token be refreshed or not.
   * @description Essentialy checks status
   * @param {Response} response
   * @returns {boolean}
   */
  public refreshShouldHappen(response: HttpErrorResponse): boolean {
    return false
  }

  /**
   * Verify that outgoing request is refresh-token,
   * so interceptor won't intercept this request
   * @param {string} url
   * @returns {boolean}
   */
  public verifyTokenRequest(url: string): boolean {
    return url.endsWith('/refresh');
  }

  /**
   * EXTRA AUTH METHODS
   */

  public login(loginData): Observable<any> {
    var service = this.environmentService.setAuthService('oauth/token');
    var loginFormData = this.environmentService.setLoginJson(loginData);
    return this.http.post(service, loginFormData)
    .pipe(tap((tokens: AccessData) => this.saveAccessData(tokens)));
  }

  /**
   * Logout
   */
  public logout(): void {
    this.tokenStorage.clear();
    location.reload(true);
  }

  /**
   * Save access data in the storage
   *
   * @private
   * @param {AccessData} data
   */
  private saveAccessData({ access_token, refresh_token }: AccessData) {
    this.tokenStorage
      .setAccessToken(access_token)
      .setRefreshToken(refresh_token);
  }

}
