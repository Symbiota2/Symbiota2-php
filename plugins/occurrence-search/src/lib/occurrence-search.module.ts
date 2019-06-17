import {NgModule} from '@angular/core';
import {OccurrenceSearchComponent} from './occurrence-search/occurrence-search.component';

import {CollectionModule} from 'collection';

@NgModule({
    imports: [
        CollectionModule
    ],
    declarations: [
        OccurrenceSearchComponent
    ],
    exports: [
        OccurrenceSearchComponent
    ],
    entryComponents: [
        OccurrenceSearchComponent
    ],
    providers: [
        {
            provide: 'occurrence-search',
            useValue: [{
                name: 'occurrence-search-search',
                component: OccurrenceSearchComponent
            }],
            multi: true
        }
    ]
})
export class OccurrenceSearchModule {
}
