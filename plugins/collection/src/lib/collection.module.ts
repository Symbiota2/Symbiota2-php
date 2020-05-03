import {NgModule} from '@angular/core';
import {TranslateModule} from '@ngx-translate/core';

import {SymbiotaAuthModule} from 'symbiota-auth';
import {SymbiotaSharedModule} from 'symbiota-shared';

import {CollectionCheckboxListComponent} from './components/collection-checkbox-list/collection-checkbox-list.component';
import {UserProfileCollectionTabComponent} from './containers/user-profile-collection-tab/user-profile-collection-tab.component';
import {RareSpeciesReaderAvailablePermissionComponent} from './components/rare-species-reader-available-permission/rare-species-reader-available-permission.component';
import {RareSpeciesReaderCurrentPermissionComponent} from './components/rare-species-reader-current-permission/rare-species-reader-current-permission.component';

import {CollectionListService} from './services/collection-list.service';
import {CollectionService} from './services/collection.service';

@NgModule({
    declarations: [
        CollectionCheckboxListComponent,
        UserProfileCollectionTabComponent,
        RareSpeciesReaderAvailablePermissionComponent,
        RareSpeciesReaderCurrentPermissionComponent
    ],
    imports: [
        TranslateModule,
        SymbiotaAuthModule,
        SymbiotaSharedModule
    ],
    exports: [
        CollectionCheckboxListComponent
    ],
    entryComponents: [
        CollectionCheckboxListComponent,
        UserProfileCollectionTabComponent,
        RareSpeciesReaderAvailablePermissionComponent,
        RareSpeciesReaderCurrentPermissionComponent
    ],
    providers: [
        CollectionService,
        CollectionListService,
        {
            provide: 'collection-checkbox-list',
            useValue: [{
                name: 'collection-collection-checkbox-list',
                component: CollectionCheckboxListComponent
            }],
            multi: true
        },
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
        }
    ]
})
export class CollectionModule {}
