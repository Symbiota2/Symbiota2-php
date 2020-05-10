import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';

import {UserPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'taxa-taxon-current-permission',
    templateUrl: './taxon-current-permission.component.html',
    styleUrls: ['./taxon-current-permission.component.css'],
})
export class TaxonCurrentPermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    taxonomyEditorPermission: UserPermission | null;
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
            this.taxonomyEditorPermission = (value ? value.find(x => x.role === 'Taxonomy') : null);
            this.taxonProfileEditorPermission = (value ? value.find(x => x.role === 'TaxonProfile') : null);
        });
    }
}
