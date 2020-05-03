import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';

import {UserPermission} from '../../interfaces/permission.interface';
import {AddPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'key-key-editor-available-permission',
    templateUrl: './key-editor-available-permission.component.html',
    styleUrls: ['./key-editor-available-permission.component.css'],
})
export class KeyEditorAvailablePermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    keyEditorPermission: UserPermission | null;
    userId: number;

    constructor(
        public permissionService: PermissionService
    ) {}

    onPermissionAdd() {
        const newPermission: AddPermission = {
            userId: '/api/users/' + this.userId,
            role: 'KeyEditor'
        };
        this.permissionService.createPermission(newPermission);
        this.changeEmitter.emit();
    }

    ngOnInit() {
        this.params.userId.subscribe(value => {
            this.userId = value;
        });
        this.params.currentPermissions.subscribe(value => {
            this.keyEditorPermission = (value ? value.find(x => x.role === 'KeyEditor') : null);
        });
    }
}
