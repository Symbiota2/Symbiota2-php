import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';

import {UserPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'key-key-current-permission',
    templateUrl: './key-current-permission.component.html',
    styleUrls: ['./key-current-permission.component.css'],
})
export class KeyCurrentPermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    keyAdminPermission: UserPermission | null;
    keyEditorPermission: UserPermission | null;

    constructor(
        public permissionService: PermissionService
    ) {}

    onPermissionDelete(id: number) {
        this.permissionService.deletePermissionById(id);
        this.changeEmitter.emit();
    }

    ngOnInit() {
        this.params.currentPermissions.subscribe(value => {
            this.keyAdminPermission = (value ? value.find(x => x.role === 'KeyAdmin') : null);
            this.keyEditorPermission = (value ? value.find(x => x.role === 'KeyEditor') : null);
        });
    }
}
