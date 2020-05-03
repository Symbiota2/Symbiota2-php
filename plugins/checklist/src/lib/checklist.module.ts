import {NgModule} from '@angular/core';
import {TranslateModule} from '@ngx-translate/core';

import {SymbiotaAuthModule} from 'symbiota-auth';
import {SymbiotaSharedModule} from 'symbiota-shared';

import {RareSpeciesAdminAvailablePermissionComponent} from './components/rare-species-admin-available-permission/rare-species-admin-available-permission.component';
import {RareSpeciesAdminCurrentPermissionComponent} from './components/rare-species-admin-current-permission/rare-species-admin-current-permission.component';

import {ChecklistService} from './services/checklist.service';
import {ProjectService} from './services/project.service';

@NgModule({
    declarations: [
        RareSpeciesAdminAvailablePermissionComponent,
        RareSpeciesAdminCurrentPermissionComponent
    ],
    imports: [
        TranslateModule,
        SymbiotaAuthModule,
        SymbiotaSharedModule
    ],
    entryComponents: [
        RareSpeciesAdminAvailablePermissionComponent,
        RareSpeciesAdminCurrentPermissionComponent
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
        }
    ]
})
export class ChecklistModule {
}
