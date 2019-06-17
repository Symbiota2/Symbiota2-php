import {NgModule} from '@angular/core';
import {SymbiotaSharedModule} from 'symbiota-shared';

import {CollectionListService} from './collection-list.service';

import {CollectionCheckboxListComponent} from './collection-checkbox-list/collection-checkbox-list.component';

@NgModule({
    declarations: [
        CollectionCheckboxListComponent
    ],
    imports: [
        SymbiotaSharedModule
    ],
    exports: [
        CollectionCheckboxListComponent
    ],
    entryComponents: [
        CollectionCheckboxListComponent
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
        }
    ]
})
export class CollectionModule {
}
