import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';
import {ChecklistService} from '../../services/checklist.service';

import {ChecklistListItem} from '../../interfaces/checklist.interface';
import {CurrentPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'checklist-checklist-current-permission',
    templateUrl: './checklist-current-permission.component.html',
    styleUrls: ['./checklist-current-permission.component.css'],
})
export class ChecklistCurrentPermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    checklistPermissions: CurrentPermission[] = [];
    checklistList: ChecklistListItem[];

    constructor(
        public permissionService: PermissionService,
        public checklistService: ChecklistService
    ) {
        this.checklistService.setChecklistList();
    }

    onPermissionDelete(id: number) {
        this.permissionService.deletePermissionById(id);
        this.changeEmitter.emit();
    }

    ngOnInit() {
        this.checklistService.checklistList.subscribe(checklistList => {
            this.checklistList = (checklistList ? checklistList : []);
            if (this.checklistList.length > 0) {
                this.params.currentPermissions.subscribe(value => {
                    this.checklistPermissions = [];
                    value.forEach((permission) => {
                        if (permission && permission.role === 'CollAdmin') {
                            const checklist = this.checklistList.find(x => x.id === permission.tableId);
                            if (checklist) {
                                this.checklistPermissions.push({
                                    permissionId: permission.id,
                                    itemName: checklist.name
                                });
                            }
                        }
                    });
                    this.checklistPermissions.sort((a, b) => a.itemName.localeCompare(b.itemName));
                });
            }
        });
    }
}
