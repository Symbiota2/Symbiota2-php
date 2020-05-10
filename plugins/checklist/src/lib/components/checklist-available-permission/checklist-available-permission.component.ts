import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';
import {ChecklistService} from '../../services/checklist.service';

import {AddPermission} from '../../interfaces/permission.interface';
import {ChecklistListItem} from '../../interfaces/checklist.interface';

@Component({
    selector: 'checklist-checklist-available-permission',
    templateUrl: './checklist-available-permission.component.html',
    styleUrls: ['./checklist-available-permission.component.css'],
})
export class ChecklistAvailablePermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    checklistPermissions = [];
    checklistList: ChecklistListItem[];
    userId: number;

    constructor(
        public permissionService: PermissionService,
        public checklistService: ChecklistService
    ) {
        this.checklistService.setChecklistList();
        this.checklistService.checklistList.subscribe(value => {
            this.checklistList = value;
        });
    }

    onPermissionAdd(tableId: number) {
        const newPermission: AddPermission = {
            userId: '/api/users/' + this.userId,
            role: 'ClAdmin',
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
            this.checklistPermissions = [];
            value.forEach((permission) => {
                if (permission && permission.tableId) {
                    if (permission.role === 'ClAdmin') {
                        this.checklistPermissions.push(permission.tableId);
                    }
                }
            });
        });
    }
}
