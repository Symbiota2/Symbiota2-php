import {Component} from '@angular/core';

import {PluginComponentService} from 'symbiota-plugin';
import {PermissionService} from 'symbiota-shared';

import {ComponentHook} from '../../../plugin/interfaces/component-hook.interface';
import {UserPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'app-user-permissions-current',
    templateUrl: './user-permissions-current.component.html',
    styleUrls: ['./user-permissions-current.component.css'],
})
export class UserPermissionsCurrentComponent {
    currentPermissions: UserPermission[];
    globalPermissionComponentsArr: ComponentHook[];
    itemPermissionComponentsArr: ComponentHook[];

    constructor(
        public permissionService: PermissionService,
        private componentService: PluginComponentService
    ) {
        this.permissionService.currentPermissions.subscribe(value => {
            this.currentPermissions = value;
        });

        this.globalPermissionComponentsArr = Object.assign([], this.componentService.getOutletComponents('global-permission-current'));
        this.globalPermissionComponentsArr.sort((a, b) => a.index - b.index);

        this.itemPermissionComponentsArr = Object.assign([], this.componentService.getOutletComponents('item-permission-current'));
        this.itemPermissionComponentsArr.sort((a, b) => a.index - b.index);
    }
}
