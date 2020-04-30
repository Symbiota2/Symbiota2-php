import {Component} from '@angular/core';

import {PermissionService} from 'symbiota-shared';

import {UserPermission} from '../../interfaces/permission.interface';
import {AddPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'app-super-admin-available-permission',
    templateUrl: './super-admin-available-permission.component.html',
    styleUrls: ['./super-admin-available-permission.component.css'],
})
export class SuperAdminAvailablePermissionComponent {
    superAdminPermission: UserPermission | null;
    userId: number;

    constructor(
        public permissionService: PermissionService
    ) {
        this.permissionService.userId.subscribe(value => {
            this.userId = value;
        });
        this.permissionService.currentPermissions.subscribe(value => {
            this.superAdminPermission = (value ? value.find(x => x.role === 'SuperAdmin') : null);
        });
    }

    onPermissionAdd() {
        const newPermission: AddPermission = {
            userId: '/api/users/' + this.userId,
            role: 'SuperAdmin'
        };
        this.permissionService.createPermission(newPermission);
    }
}
