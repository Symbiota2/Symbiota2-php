import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';

import {UserPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'taxa-taxon-profile-editor-current-permission',
    templateUrl: './taxon-profile-editor-current-permission.component.html',
    styleUrls: ['./taxon-profile-editor-current-permission.component.css'],
})
export class TaxonProfileEditorCurrentPermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    taxonProfileEditorPermission: UserPermission | null;

    constructor(
        public permissionService: PermissionService
    ) {}

    onPermissionDelete(id: number) {
        this.permissionService.deletePermissionById(id);
        this.changeEmitter.emit();
    }

    ngOnInit() {
        this.params.currentPermissions.subscribe(value => {
            this.taxonProfileEditorPermission = (value ? value.find(x => x.role === 'TaxonProfile') : null);
        });
    }
}
