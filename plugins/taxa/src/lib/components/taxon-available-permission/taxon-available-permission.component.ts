import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';

import {UserPermission} from '../../interfaces/permission.interface';
import {AddPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'taxa-taxon-available-permission',
    templateUrl: './taxon-available-permission.component.html',
    styleUrls: ['./taxon-available-permission.component.css'],
})
export class TaxonAvailablePermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    taxonomyEditorPermission: UserPermission | null;
    taxonProfileEditorPermission: UserPermission | null;
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
            this.taxonomyEditorPermission = (value ? value.find(x => x.role === 'Taxonomy') : null);
            this.taxonProfileEditorPermission = (value ? value.find(x => x.role === 'TaxonProfile') : null);
        });
    }
}
