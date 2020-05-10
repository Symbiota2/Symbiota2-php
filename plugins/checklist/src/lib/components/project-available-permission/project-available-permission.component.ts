import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';
import {ProjectService} from '../../services/project.service';

import {AddPermission} from '../../interfaces/permission.interface';
import {ProjectListItem} from '../../interfaces/project.interface';

@Component({
    selector: 'checklist-project-available-permission',
    templateUrl: './project-available-permission.component.html',
    styleUrls: ['./project-available-permission.component.css'],
})
export class ProjectAvailablePermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    projectPermissions = [];
    projectList: ProjectListItem[];
    userId: number;

    constructor(
        public permissionService: PermissionService,
        public projectService: ProjectService
    ) {
        this.projectService.setProjectList();
        this.projectService.projectList.subscribe(value => {
            this.projectList = value;
        });
    }

    onPermissionAdd(tableId: number) {
        const newPermission: AddPermission = {
            userId: '/api/users/' + this.userId,
            role: 'ProjAdmin',
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
            this.projectPermissions = [];
            value.forEach((permission) => {
                if (permission && permission.tableId) {
                    if (permission.role === 'ProjAdmin') {
                        this.projectPermissions.push(permission.tableId);
                    }
                }
            });
        });
    }
}
