import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';

import {UserPermission} from '../../interfaces/permission.interface';
import {AddPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'taxa-taxon-profile-editor-available-permission',
    templateUrl: './taxon-profile-editor-available-permission.component.html',
    styleUrls: ['./taxon-profile-editor-available-permission.component.css'],
})
export class TaxonProfileEditorAvailablePermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    taxonProfileEditorPermission: UserPermission | null;
    userId: number;

    constructor(
        public permissionService: PermissionService
    ) {}

    onPermissionAdd() {
        const newPermission: AddPermission = {
            userId: '/api/users/' + this.userId,
            role: 'TaxonProfile'
        };
        this.permissionService.createPermission(newPermission);
        this.changeEmitter.emit();
    }

    ngOnInit() {
        this.params.userId.subscribe(value => {
            this.userId = value;
        });
        this.params.currentPermissions.subscribe(value => {
            this.taxonProfileEditorPermission = (value ? value.find(x => x.role === 'TaxonProfile') : null);
        });
    }
}
