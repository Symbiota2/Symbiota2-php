import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';

import {UserPermission} from '../../interfaces/permission.interface';
import {AddPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'key-key-admin-available-permission',
    templateUrl: './key-admin-available-permission.component.html',
    styleUrls: ['./key-admin-available-permission.component.css'],
})
export class KeyAdminAvailablePermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    keyAdminPermission: UserPermission | null;
    userId: number;

    constructor(
        public permissionService: PermissionService
    ) {}

    onPermissionAdd() {
        const newPermission: AddPermission = {
            userId: '/api/users/' + this.userId,
            role: 'KeyAdmin'
        };
        this.permissionService.createPermission(newPermission);
        this.changeEmitter.emit();
    }

    ngOnInit() {
        this.params.userId.subscribe(value => {
            this.userId = value;
        });
        this.params.currentPermissions.subscribe(value => {
            this.keyAdminPermission = (value ? value.find(x => x.role === 'KeyAdmin') : null);
        });
    }
}
