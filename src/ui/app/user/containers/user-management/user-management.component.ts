import {Component} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Router} from '@angular/router';

import {SharedUserService} from 'symbiota-shared';
import {PermissionService} from 'symbiota-shared';
import {AuthService} from 'symbiota-auth';
import {SpinnerOverlayService} from 'symbiota-shared';

import {UserDetail} from '../../interfaces/user.interface';

@Component({
    selector: 'app-user-management',
    templateUrl: './user-management.component.html',
    styleUrls: ['./user-management.component.css'],
})
export class UserManagementComponent {
    userId: number;
    userInfo: UserDetail = null;
    accessPermissions = [
        'SuperAdmin'
    ];

    constructor(
        public userService: SharedUserService,
        public permissionService: PermissionService,
        public spinnerService: SpinnerOverlayService,
        private authService: AuthService,
        private http: HttpClient,
        private router: Router
    ) {
        this.authService.validateAccess(this.accessPermissions);
    }

    onUserSelection(value) {
        this.spinnerService.show();
        this.userId = value;
        this.userService.getUserById(this.userId).subscribe( data => {
            this.userInfo = data;
        });
        this.permissionService.setUserId(this.userId);
        this.permissionService.setUserPermissions();
    }

    resetUid() {
        this.userId = null;
        this.userInfo = null;
        this.permissionService.clearUser();
    }

    loginAs() {
        const data: any = { username: this.userInfo.username };
        this.http.post<any>('/api/users/loginas', data).subscribe(
            () => {
                this.router.navigate(['/']).then(() => {
                    location.reload();
                });
            }
        );
    }
}
