import {NgModule} from '@angular/core';
import {TranslateModule} from "@ngx-translate/core";

import {CollectionModule} from 'collection';
import {SymbiotaAuthModule} from 'symbiota-auth';
import {SymbiotaSharedModule} from 'symbiota-shared';

import {SearchCriteriaComponent} from './outlets/search-criteria/search-criteria.component';
import { CollectionSelectPageComponent } from './components/collection-select-page/collection-select-page.component';
import { SearchCriteriaPageComponent } from './components/search-criteria-page/search-criteria-page.component';
import { SearchResultsPageComponent } from './components/search-results-page/search-results-page.component';
import { BindQueryParamsDirective } from './directives/bind-query-params.directive';

@NgModule({
    imports: [
        TranslateModule,
        CollectionModule,
        SymbiotaAuthModule,
        SymbiotaSharedModule
    ],
    declarations: [
        SearchCriteriaComponent,
        CollectionSelectPageComponent,
        SearchCriteriaPageComponent,
        SearchResultsPageComponent,
        BindQueryParamsDirective
    ],
    entryComponents: [
        SearchCriteriaComponent
    ],
    providers: [
        {
            provide: 'search-criteria',
            useValue: [{
                name: 'occurrence-search-search-criteria',
                component: SearchCriteriaComponent
            }],
            multi: true
        }
    ]
})
export class OccurrenceSearchModule {
}
