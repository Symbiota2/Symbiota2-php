import {NgModule} from '@angular/core';
import {TranslateModule} from '@ngx-translate/core';

import {SymbiotaAuthModule} from 'symbiota-auth';
import {SymbiotaSharedModule} from 'symbiota-shared';

import {CollectionCheckboxListComponent} from './collection-checkbox-list/collection-checkbox-list.component';
import {UserProfileCollectionTabComponent} from './user-profile-collection-tab/user-profile-collection-tab.component';

import {CollectionListService} from './collection-list.service';

@NgModule({
    declarations: [
        CollectionCheckboxListComponent,
        UserProfileCollectionTabComponent
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
