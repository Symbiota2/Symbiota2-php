import {Component} from '@angular/core';

import {PluginComponentService} from 'symbiota-plugin';
import {PermissionService} from 'symbiota-shared';

import {ComponentHook} from '../../../plugin/interfaces/component-hook.interface';
import {UserPermission} from '../../interfaces/permission.interface';
import {Observable} from 'rxjs';

@Component({
    selector: 'app-user-permissions-current',
    templateUrl: './user-permissions-current.component.html',
    styleUrls: ['./user-permissions-current.component.css'],
})
export class UserPermissionsCurrentComponent {
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

        this.globalPermissionComponentsArr = Object.assign([], this.componentService.getOutletComponents('global-permission-current', this.params));
        this.globalPermissionComponentsArr.sort((a, b) => a.index - b.index);

        this.itemPermissionComponentsArr = Object.assign([], this.componentService.getOutletComponents('item-permission-current', this.params));
        this.itemPermissionComponentsArr.sort((a, b) => a.index - b.index);
    }

    processPermissionChange() {
        this.permissionService.setUserPermissions();
    }
}
