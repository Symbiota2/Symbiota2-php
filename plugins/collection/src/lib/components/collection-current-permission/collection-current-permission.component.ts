import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';
import {CollectionService} from '../../services/collection.service';
import {CollectionListItem} from '../../interfaces/collection.interface';

import {CurrentPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'collection-collection-current-permission',
    templateUrl: './collection-current-permission.component.html',
    styleUrls: ['./collection-current-permission.component.css'],
})
export class CollectionCurrentPermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    adminCollectionPermissions: CurrentPermission[] = [];
    editorCollectionPermissions: CurrentPermission[] = [];
    rareCollectionPermissions: CurrentPermission[] = [];
    collectionList: CollectionListItem[];

    constructor(
        public permissionService: PermissionService,
        public collectionService: CollectionService
    ) {}

    onPermissionDelete(id: number) {
        this.permissionService.deletePermissionById(id);
        this.changeEmitter.emit();
    }

    ngOnInit() {
        this.collectionService.collectionList.subscribe(collectionList => {
            this.collectionList = (collectionList ? collectionList : []);
            if (this.collectionList.length > 0) {
                this.params.currentPermissions.subscribe(value => {
                    this.adminCollectionPermissions = [];
                    this.editorCollectionPermissions = [];
                    this.rareCollectionPermissions = [];
                    value.forEach((permission) => {
                        if (permission && permission.role === 'CollAdmin') {
                            const collection = this.collectionList.find(x => x.id === permission.tableId);
                            if (collection) {
                                this.adminCollectionPermissions.push({
                                    permissionId: permission.id,
                                    collectionName: collection.collectionName
                                });
                            }
                        }
                        if (permission && permission.role === 'CollEditor') {
                            const collection = this.collectionList.find(x => x.id === permission.tableId);
                            if (collection) {
                                this.editorCollectionPermissions.push({
                                    permissionId: permission.id,
                                    collectionName: collection.collectionName
                                });
                            }
                        }
                        if (permission && permission.role === 'RareSppReader') {
                            const collection = this.collectionList.find(x => x.id === permission.tableId);
                            if (collection) {
                                this.rareCollectionPermissions.push({
                                    permissionId: permission.id,
                                    collectionName: collection.collectionName
                                });
                            }
                        }
                    });
                    this.adminCollectionPermissions.sort((a, b) => a.collectionName.localeCompare(b.collectionName));
                    this.editorCollectionPermissions.sort((a, b) => a.collectionName.localeCompare(b.collectionName));
                    this.rareCollectionPermissions.sort((a, b) => a.collectionName.localeCompare(b.collectionName));
                });
            }
        });
    }

}
