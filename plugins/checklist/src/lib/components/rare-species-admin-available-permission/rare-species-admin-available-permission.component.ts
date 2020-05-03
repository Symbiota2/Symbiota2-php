import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';

import {UserPermission} from '../../interfaces/permission.interface';
import {AddPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'checklist-rare-species-admin-available-permission',
    templateUrl: './rare-species-admin-available-permission.component.html',
    styleUrls: ['./rare-species-admin-available-permission.component.css'],
})
export class RareSpeciesAdminAvailablePermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    rareSpeciesAdminPermission: UserPermission | null;
    userId: number;

    constructor(
        public permissionService: PermissionService
    ) {}

    onPermissionAdd() {
        const newAdminPermission: AddPermission = {
            userId: '/api/users/' + this.userId,
            role: 'RareSppAdmin'
        };
        const newReaderPermission: AddPermission = {
            userId: '/api/users/' + this.userId,
            role: 'RareSppReadAll'
        };
        this.permissionService.createPermission(newAdminPermission);
        this.permissionService.createPermission(newReaderPermission);
        this.changeEmitter.emit();
    }

    ngOnInit() {
        this.params.userId.subscribe(value => {
            this.userId = value;
        });
        this.params.currentPermissions.subscribe(value => {
            this.rareSpeciesAdminPermission = (value ? value.find(x => x.role === 'RareSppAdmin') : null);
        });
    }
}
