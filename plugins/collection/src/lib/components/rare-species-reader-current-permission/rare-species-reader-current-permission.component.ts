import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';

import {UserPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'collection-rare-species-reader-current-permission',
    templateUrl: './rare-species-reader-current-permission.component.html',
    styleUrls: ['./rare-species-reader-current-permission.component.css'],
})
export class RareSpeciesReaderCurrentPermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    rareSpeciesReaderPermission: UserPermission | null;

    constructor(
        public permissionService: PermissionService
    ) {}

    onPermissionDelete(id: number) {
        this.permissionService.deletePermissionById(id);
        this.changeEmitter.emit();
    }

    ngOnInit() {
        this.params.currentPermissions.subscribe(value => {
            this.rareSpeciesReaderPermission = (value ? value.find(x => x.role === 'RareSppReadAll') : null);
        });
    }
}
