import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';

import {UserPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'key-key-editor-current-permission',
    templateUrl: './key-editor-current-permission.component.html',
    styleUrls: ['./key-editor-current-permission.component.css'],
})
export class KeyEditorCurrentPermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
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
            this.keyEditorPermission = (value ? value.find(x => x.role === 'KeyEditor') : null);
        });
    }
}
