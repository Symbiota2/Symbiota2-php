import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {TranslateModule} from '@ngx-translate/core';

import {SymbiotaAuthModule} from 'symbiota-auth';
import {SymbiotaSharedModule} from 'symbiota-shared';

import {UserProfileCollectionTabComponent} from './containers/user-profile-collection-tab/user-profile-collection-tab.component';
import {RareSpeciesReaderAvailablePermissionComponent} from './components/rare-species-reader-available-permission/rare-species-reader-available-permission.component';
import {RareSpeciesReaderCurrentPermissionComponent} from './components/rare-species-reader-current-permission/rare-species-reader-current-permission.component';
import {CollectionCurrentPermissionComponent} from './components/collection-current-permission/collection-current-permission.component';
import {CollectionAvailablePermissionComponent} from './components/collection-available-permission/collection-available-permission.component';
import {CollectionCheckboxSelectorComponent} from './components/collection-checkbox-selector/collection-checkbox-selector.component';

import {CollectionListService} from './services/collection-list.service';
import {CollectionService} from './services/collection.service';

@NgModule({
    declarations: [
        UserProfileCollectionTabComponent,
        RareSpeciesReaderAvailablePermissionComponent,
        RareSpeciesReaderCurrentPermissionComponent,
        CollectionCurrentPermissionComponent,
        CollectionAvailablePermissionComponent,
        CollectionCheckboxSelectorComponent
    ],
    imports: [
        CommonModule,
        TranslateModule,
        SymbiotaAuthModule,
        SymbiotaSharedModule
    ],
    exports: [
        CommonModule,
        CollectionCheckboxSelectorComponent
    ],
    entryComponents: [
        UserProfileCollectionTabComponent,
        RareSpeciesReaderAvailablePermissionComponent,
        RareSpeciesReaderCurrentPermissionComponent,
        CollectionCurrentPermissionComponent,
        CollectionAvailablePermissionComponent,
        CollectionCheckboxSelectorComponent
    ],
    providers: [
        CollectionService,
        CollectionListService,
        {
            provide: 'user-profile-collection-tab',
            useValue: [{
                name: 'collection-user-profile-collection-tab',
                component: UserProfileCollectionTabComponent
            }],
            multi: true
        },
        {
            provide: 'rare-species-reader-available-permission',
            useValue: [{
                name: 'collection-rare-species-reader-available-permission',
                component: RareSpeciesReaderAvailablePermissionComponent
            }],
            multi: true
        },
        {
            provide: 'rare-species-reader-current-permission',
            useValue: [{
                name: 'collection-rare-species-reader-current-permission',
                component: RareSpeciesReaderCurrentPermissionComponent
            }],
            multi: true
        },
        {
            provide: 'collection-current-permission',
            useValue: [{
                name: 'collection-collection-current-permission',
                component: CollectionCurrentPermissionComponent
            }],
            multi: true
        },
        {
            provide: 'collection-available-permission',
            useValue: [{
                name: 'collection-collection-available-permission',
                component: CollectionAvailablePermissionComponent
            }],
            multi: true
        }
    ]
})
export class CollectionModule {}
