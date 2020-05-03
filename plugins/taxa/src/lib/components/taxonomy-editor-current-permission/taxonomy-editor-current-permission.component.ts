import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';

import {UserPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'taxa-taxonomy-editor-current-permission',
    templateUrl: './taxonomy-editor-current-permission.component.html',
    styleUrls: ['./taxonomy-editor-current-permission.component.css'],
})
export class TaxonomyEditorCurrentPermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    taxonomyEditorPermission: UserPermission | null;

    constructor(
        public permissionService: PermissionService
    ) {}

    onPermissionDelete(id: number) {
        this.permissionService.deletePermissionById(id);
        this.changeEmitter.emit();
    }

    ngOnInit() {
        this.params.currentPermissions.subscribe(value => {
            this.taxonomyEditorPermission = (value ? value.find(x => x.role === 'Taxonomy') : null);
        });
    }
}
