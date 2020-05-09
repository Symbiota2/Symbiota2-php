import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';
import {CollectionService} from '../../services/collection.service';

import {AddPermission} from '../../interfaces/permission.interface';
import {CollectionListItem} from '../../interfaces/collection.interface';

@Component({
    selector: 'collection-collection-available-permission',
    templateUrl: './collection-available-permission.component.html',
    styleUrls: ['./collection-available-permission.component.css'],
})
export class CollectionAvailablePermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    adminCollectionPermissions = [];
    editorCollectionPermissions = [];
    rareCollectionPermissions = [];
    collectionList: CollectionListItem[];
    userId: number;

    constructor(
        public permissionService: PermissionService,
        public collectionService: CollectionService
    ) {
        this.collectionService.collectionList.subscribe(value => {
            this.collectionList = value;
        });
    }

    onPermissionAdd(role: string, tableId: number) {
        const newPermission: AddPermission = {
            userId: '/api/users/' + this.userId,
            role: role,
            tableId: tableId
        };
        this.permissionService.createPermission(newPermission);
        this.changeEmitter.emit();
    }

    ngOnInit() {
        this.params.userId.subscribe(value => {
            this.userId = value;
        });
        this.params.currentPermissions.subscribe(value => {
            this.adminCollectionPermissions = [];
            this.editorCollectionPermissions = [];
            this.rareCollectionPermissions = [];
            value.forEach((permission) => {
                if (permission && permission.tableId) {
                    if (permission.role === 'CollAdmin') {
                        this.adminCollectionPermissions.push(permission.tableId);
                    }
                    if (permission.role === 'CollEditor') {
                        this.editorCollectionPermissions.push(permission.tableId);
                    }
                    if (permission.role === 'RareSppReader') {
                        this.rareCollectionPermissions.push(permission.tableId);
                    }
                }
            });
        });
    }

}
