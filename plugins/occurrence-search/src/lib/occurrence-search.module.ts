import {NgModule} from '@angular/core';
import {OccurrenceSearchComponent} from './occurrence-search.component';

import {CollectionModule} from '../../../collection/src/lib/collection.module';

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
