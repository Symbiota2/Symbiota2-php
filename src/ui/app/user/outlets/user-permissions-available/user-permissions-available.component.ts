import {Component} from '@angular/core';

import {PluginComponentService} from 'symbiota-plugin';

import {ComponentHook} from '../../../plugin/interfaces/component-hook.interface';

@Component({
    selector: 'app-user-permissions-available',
    templateUrl: './user-permissions-available.component.html',
    styleUrls: ['./user-permissions-available.component.css'],
})
export class UserPermissionsAvailableComponent {
    globalPermissionComponentsArr: ComponentHook[];
    itemPermissionComponentsArr: ComponentHook[];

    constructor(
        private componentService: PluginComponentService
    ) {
        this.globalPermissionComponentsArr = Object.assign([], this.componentService.getOutletComponents('global-permission-available'));
        this.globalPermissionComponentsArr.sort((a, b) => a.index - b.index);

        this.itemPermissionComponentsArr = Object.assign([], this.componentService.getOutletComponents('item-permission-available'));
        this.itemPermissionComponentsArr.sort((a, b) => a.index - b.index);
    }
}
