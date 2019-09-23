import {NgModule} from '@angular/core';
import {TranslateModule} from "@ngx-translate/core";

import {CollectionModule} from 'collection';
import {SymbiotaAuthModule} from 'symbiota-auth';
import {SymbiotaSharedModule} from 'symbiota-shared';

import {OccurrenceSearchComponent} from './occurrence-search/occurrence-search.component';

@NgModule({
    imports: [
        TranslateModule,
        CollectionModule,
        SymbiotaAuthModule,
        SymbiotaSharedModule
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
