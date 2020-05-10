import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';

import {UserPermission} from '../../interfaces/permission.interface';
import {AddPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'key-key-available-permission',
    templateUrl: './key-available-permission.component.html',
    styleUrls: ['./key-available-permission.component.css'],
})
export class KeyAvailablePermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    keyAdminPermission: UserPermission | null;
    keyEditorPermission: UserPermission | null;
    userId: number;

    constructor(
        public permissionService: PermissionService
    ) {}

    onPermissionAdd(permission: string) {
        const newPermission: AddPermission = {
            userId: '/api/users/' + this.userId,
            role: permission
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
            this.keyEditorPermission = (value ? value.find(x => x.role === 'KeyEditor') : null);
        });
    }
}
