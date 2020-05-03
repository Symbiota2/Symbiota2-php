import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';

import {UserPermission} from '../../interfaces/permission.interface';
import {AddPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'collection-rare-species-reader-available-permission',
    templateUrl: './rare-species-reader-available-permission.component.html',
    styleUrls: ['./rare-species-reader-available-permission.component.css'],
})
export class RareSpeciesReaderAvailablePermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    rareSpeciesReaderPermission: UserPermission | null;
    userId: number;

    constructor(
        public permissionService: PermissionService
    ) {}

    onPermissionAdd() {
        const newPermission: AddPermission = {
            userId: '/api/users/' + this.userId,
            role: 'RareSppReadAll'
        };
        this.permissionService.createPermission(newPermission);
        this.changeEmitter.emit();
    }

    ngOnInit() {
        this.params.userId.subscribe(value => {
            this.userId = value;
        });
        this.params.currentPermissions.subscribe(value => {
            this.rareSpeciesReaderPermission = (value ? value.find(x => x.role === 'RareSppReadAll') : null);
        });
    }
}
