import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';

import {PermissionService} from 'symbiota-shared';
import {ProjectService} from '../../services/project.service';

import {ProjectListItem} from '../../interfaces/project.interface';
import {CurrentPermission} from '../../interfaces/permission.interface';

@Component({
    selector: 'checklist-project-current-permission',
    templateUrl: './project-current-permission.component.html',
    styleUrls: ['./project-current-permission.component.css'],
})
export class ProjectCurrentPermissionComponent implements OnInit {
    @Input() params: any;
    @Output() changeEmitter = new EventEmitter<any>();
    projectPermissions: CurrentPermission[] = [];
    projectList: ProjectListItem[];

    constructor(
        public permissionService: PermissionService,
        public projectService: ProjectService
    ) {
        this.projectService.setProjectList();
    }

    onPermissionDelete(id: number) {
        this.permissionService.deletePermissionById(id);
        this.changeEmitter.emit();
    }

    ngOnInit() {
        this.projectService.projectList.subscribe(projectList => {
            this.projectList = (projectList ? projectList : []);
            if (this.projectList.length > 0) {
                this.params.currentPermissions.subscribe(value => {
                    this.projectPermissions = [];
                    value.forEach((permission) => {
                        if (permission && permission.role === 'CollAdmin') {
                            const project = this.projectList.find(x => x.id === permission.tableId);
                            if (project) {
                                this.projectPermissions.push({
                                    permissionId: permission.id,
                                    itemName: project.projectName
                                });
                            }
                        }
                    });
                    this.projectPermissions.sort((a, b) => a.itemName.localeCompare(b.itemName));
                });
            }
        });
    }
}
