import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';

import {UserPermission} from '../../interfaces/permission.interface';
import {AddPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'taxa-taxonomy-editor-available-permission',
    templateUrl: './taxonomy-editor-available-permission.component.html',
    styleUrls: ['./taxonomy-editor-available-permission.component.css'],
})
export class TaxonomyEditorAvailablePermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    taxonomyEditorPermission: UserPermission | null;
    userId: number;

    constructor(
        public permissionService: PermissionService
    ) {}

    onPermissionAdd() {
        const newPermission: AddPermission = {
            userId: '/api/users/' + this.userId,
            role: 'Taxonomy'
        };
        this.permissionService.createPermission(newPermission);
        this.changeEmitter.emit();
    }

    ngOnInit() {
        this.params.userId.subscribe(value => {
            this.userId = value;
        });
        this.params.currentPermissions.subscribe(value => {
            this.taxonomyEditorPermission = (value ? value.find(x => x.role === 'Taxonomy') : null);
        });
    }
}
