import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs';

import {UserDetail, UserListItem} from '../interfaces/user.interface';

@Injectable({
    providedIn: 'root',
})
export class SharedUserService {
    constructor(
        private http: HttpClient
    ) {}

    getUserById(id: number): Observable<any> {
        return this.http.get<UserDetail>('/api/users/' + id);
    }

    getUserByUsername(username: string): Observable<any> {
        return this.http.get<any>('/api/users?username=' + username);
    }

    getUserListByLastName(lastname: string): Observable<any> {
        return this.http.get<any>('/api/users?lastName=' + lastname);
    }

    mapUserListResponse(data) {
        return data['hydra:member'].map(user => {
            return <UserListItem> {
                id: user.id,
                firstName: user.firstName,
                middleInitial: user.middleInitial,
                lastName: user.lastName,
                username: user.username
            };
        });
    }
}
