import { NgModule } from "@angular/core";
import { TranslateModule } from "@ngx-translate/core";

import { CollectionModule } from "collection";
import { SymbiotaAuthModule } from "symbiota-auth";
import { SymbiotaSharedModule } from "symbiota-shared";
import { OccurrenceModule } from "occurrence";

import { SearchCriteriaComponent } from "./outlets/search-criteria/search-criteria.component";
import { SelectComponent } from "./components/select/select.component";
import { SearchResultsComponent } from "./outlets/search-results/search-results.component";
import { RouterModule } from "@angular/router";
import { SearchResultComponent } from "./components/search-result/search-result.component";
import { SearchResultModalComponent } from "./components/search-result-modal/search-result-modal.component";
import { FieldRowComponent } from "./components/search-result-modal/field-row.component";
import {SearchCollectionsComponent} from "./outlets/search-collections/search-collections.component";
import {QueryParserService} from "./services/query-parser.service";

@NgModule({
    imports: [
        TranslateModule,
        CollectionModule,
        SymbiotaAuthModule,
        SymbiotaSharedModule,
        OccurrenceModule,
        RouterModule
    ],
    declarations: [
        SearchCriteriaComponent,
        SelectComponent,
        SearchResultsComponent,
        SearchResultComponent,
        SearchResultModalComponent,
        SearchCollectionsComponent,
        SelectComponent,
        SearchResultModalComponent,
        FieldRowComponent,
        SelectComponent
    ],
    entryComponents: [
        SearchResultModalComponent,
        SearchCollectionsComponent,
        SearchCriteriaComponent,
        SearchResultsComponent
    ],
    providers: [
        QueryParserService,
        {
            provide: "search-collections",
            useValue: [{
                name: "occurrence-search-search-collections",
                component: SearchCollectionsComponent
            }],
            multi: true
        },
        {
            provide: "search-criteria",
            useValue: [{
                name: "occurrence-search-search-criteria",
                component: SearchCriteriaComponent
            }],
            multi: true
        },
        {
            provide: "search-results",
            useValue: [{
                name: "occurrence-search-search-results",
                component: SearchResultsComponent
            }],
            multi: true
        }
    ]
})
export class OccurrenceSearchModule { }
