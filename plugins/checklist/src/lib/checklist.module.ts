import {NgModule} from '@angular/core';
import {TranslateModule} from '@ngx-translate/core';

import {SymbiotaAuthModule} from 'symbiota-auth';
import {SymbiotaSharedModule} from 'symbiota-shared';

import {RareSpeciesAdminAvailablePermissionComponent} from './components/rare-species-admin-available-permission/rare-species-admin-available-permission.component';
import {RareSpeciesAdminCurrentPermissionComponent} from './components/rare-species-admin-current-permission/rare-species-admin-current-permission.component';
import {ProjectAvailablePermissionComponent} from './components/project-available-permission/project-available-permission.component';
import {ProjectCurrentPermissionComponent} from './components/project-current-permission/project-current-permission.component';
import {ChecklistAvailablePermissionComponent} from './components/checklist-available-permission/checklist-available-permission.component';
import {ChecklistCurrentPermissionComponent} from './components/checklist-current-permission/checklist-current-permission.component';

import {ChecklistService} from './services/checklist.service';
import {ProjectService} from './services/project.service';

@NgModule({
    declarations: [
        RareSpeciesAdminAvailablePermissionComponent,
        RareSpeciesAdminCurrentPermissionComponent,
        ProjectAvailablePermissionComponent,
        ProjectCurrentPermissionComponent,
        ChecklistAvailablePermissionComponent,
        ChecklistCurrentPermissionComponent
    ],
    imports: [
        TranslateModule,
        SymbiotaAuthModule,
        SymbiotaSharedModule
    ],
    entryComponents: [
        RareSpeciesAdminAvailablePermissionComponent,
        RareSpeciesAdminCurrentPermissionComponent,
        ProjectAvailablePermissionComponent,
        ProjectCurrentPermissionComponent,
        ChecklistAvailablePermissionComponent,
        ChecklistCurrentPermissionComponent
    ],
    providers: [
        ChecklistService,
        ProjectService,
        {
            provide: 'rare-species-admin-available-permission',
            useValue: [{
                name: 'checklist-rare-species-admin-available-permission',
                component: RareSpeciesAdminAvailablePermissionComponent
            }],
            multi: true
        },
        {
            provide: 'rare-species-admin-current-permission',
            useValue: [{
                name: 'checklist-rare-species-admin-current-permission',
                component: RareSpeciesAdminCurrentPermissionComponent
            }],
            multi: true
        },
        {
            provide: 'checklist-available-permission',
            useValue: [{
                name: 'checklist-checklist-available-permission',
                component: ChecklistAvailablePermissionComponent
            }],
            multi: true
        },
        {
            provide: 'checklist-current-permission',
            useValue: [{
                name: 'checklist-checklist-current-permission',
                component: ChecklistCurrentPermissionComponent
            }],
            multi: true
        },
        {
            provide: 'project-available-permission',
            useValue: [{
                name: 'checklist-project-available-permission',
                component: ProjectAvailablePermissionComponent
            }],
            multi: true
        },
        {
            provide: 'project-current-permission',
            useValue: [{
                name: 'checklist-project-current-permission',
                component: ProjectCurrentPermissionComponent
            }],
            multi: true
        }
    ]
})
export class ChecklistModule {
}
