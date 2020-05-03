import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';

import {UserPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'checklist-rare-species-admin-current-permission',
    templateUrl: './rare-species-admin-current-permission.component.html',
    styleUrls: ['./rare-species-admin-current-permission.component.css'],
})
export class RareSpeciesAdminCurrentPermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    rareSpeciesAdminPermission: UserPermission | null;

    constructor(
        public permissionService: PermissionService
    ) {}

    onPermissionDelete(id: number) {
        this.permissionService.deletePermissionById(id);
        this.changeEmitter.emit();
    }

    ngOnInit() {
        this.params.currentPermissions.subscribe(value => {
            this.rareSpeciesAdminPermission = (value ? value.find(x => x.role === 'RareSppAdmin') : null);
        });
    }
}
