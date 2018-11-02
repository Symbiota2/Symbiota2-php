import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {environment} from "../environments/environment";

@Injectable()
export class ServerService {
    apiUrl = environment.apiUrl;

    constructor(private http: HttpClient) {
    }

    signup(data) {
        return this.http.post(`${this.apiUrl}signup`, data)
    }

    login(data) {
        return this.http.post(`${this.apiUrl}login`, data)
    }

    sendPasswordResetLink(data) {
        return this.http.post(`${this.apiUrl}sendPasswordResetLink`, data)
    }

    changePassword(data) {
        return this.http.post(`${this.apiUrl}resetPassword`, data)
    }
}
