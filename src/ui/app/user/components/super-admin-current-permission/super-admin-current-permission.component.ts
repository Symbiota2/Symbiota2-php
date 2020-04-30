import {Component} from '@angular/core';

import {PermissionService} from 'symbiota-shared';

import {UserPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'app-super-admin-current-permission',
    templateUrl: './super-admin-current-permission.component.html',
    styleUrls: ['./super-admin-current-permission.component.css'],
})
export class SuperAdminCurrentPermissionComponent {
    superAdminPermission: UserPermission | null;

    constructor(
        public permissionService: PermissionService
    ) {
        this.permissionService.currentPermissions.subscribe(value => {
            this.superAdminPermission = (value ? value.find(x => x.role === 'SuperAdmin') : null);
        });
    }

    onPermissionDelete(id: number) {
        this.permissionService.deletePermissionById(id);
    }
}
