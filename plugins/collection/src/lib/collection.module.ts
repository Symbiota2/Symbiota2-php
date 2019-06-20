import {NgModule} from '@angular/core';
import {SymbiotaSharedModule} from 'symbiota-shared';

import {CollectionListService} from './collection-list.service';

import {CollectionCheckboxListComponent} from './collection-checkbox-list/collection-checkbox-list.component';
import {UserProfileCollectionTabComponent} from './user-profile-collection-tab/user-profile-collection-tab.component';

@NgModule({
    declarations: [
        CollectionCheckboxListComponent,
        UserProfileCollectionTabComponent
    ],
    imports: [
        SymbiotaSharedModule
    ],
    exports: [
        CollectionCheckboxListComponent
    ],
    entryComponents: [
        CollectionCheckboxListComponent,
        UserProfileCollectionTabComponent
    ],
    providers: [
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
        }
    ]
})
export class CollectionModule {
}
