import {Injectable} from '@angular/core';
import {HttpClient, HttpErrorResponse} from '@angular/common/http';
import {EnvironmentService} from "../shared/environment/environment.service";
import {Observable} from "rxjs";
import {map, catchError} from "rxjs/operators";

@Injectable()
export class LoginService {
    constructor(
        private _http: HttpClient,
        private environmentService: EnvironmentService
    ) {
    }

    login(loginData) {
        let url = this.environmentService.setAuthService('oauth/token');
        return this._http.post(url, loginData)
            .pipe(map(res => res))
            .pipe(catchError(this.handleError))
    }

    getUser() {
        let url = this.environmentService.setApiService('user');
        return this._http.get(url)
            .pipe(map(res => res))
            .pipe(catchError(this.handleError))
    }

    private handleError(error: Response | any) {
        let errMsg: string;
        const body = error.json() || '';
        errMsg = error.message ? error.message : error.toString();
        return Observable.throw(body);
    }
}
