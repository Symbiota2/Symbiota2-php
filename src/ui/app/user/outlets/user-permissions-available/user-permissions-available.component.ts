import {Component} from '@angular/core';
import {Observable} from 'rxjs';

import {PluginComponentService} from 'symbiota-plugin';
import {PermissionService} from 'symbiota-shared';

import {ComponentHook} from '../../../plugin/interfaces/component-hook.interface';
import {UserPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'app-user-permissions-available',
    templateUrl: './user-permissions-available.component.html',
    styleUrls: ['./user-permissions-available.component.css'],
})
export class UserPermissionsAvailableComponent {
    globalPermissionComponentsArr: ComponentHook[];
    itemPermissionComponentsArr: ComponentHook[];
    userId: Observable<number>;
    currentPermissions: Observable<UserPermission[]>;
    params: any;

    constructor(
        public permissionService: PermissionService,
        private componentService: PluginComponentService
    ) {
        this.userId = this.permissionService.userId;
        this.currentPermissions = this.permissionService.currentPermissions;
        this.params = {
            userId: this.userId,
            currentPermissions: this.currentPermissions
        };

        this.globalPermissionComponentsArr = Object.assign([], this.componentService.getOutletComponents('global-permission-available', this.params));
        this.globalPermissionComponentsArr.sort((a, b) => a.index - b.index);

        this.itemPermissionComponentsArr = Object.assign([], this.componentService.getOutletComponents('item-permission-available', this.params));
        this.itemPermissionComponentsArr.sort((a, b) => a.index - b.index);
    }

    processPermissionChange() {
        this.permissionService.setUserPermissions();
    }
}
