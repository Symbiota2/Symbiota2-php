import { NgModule } from "@angular/core";
import { TranslateModule } from "@ngx-translate/core";

import { CollectionModule } from "collection";
import { SymbiotaAuthModule } from "symbiota-auth";
import { SymbiotaSharedModule } from "symbiota-shared";
import { OccurrenceModule } from "occurrence";

import { SearchCriteriaComponent } from "./outlets/search-criteria/search-criteria.component";
import { CollectionSelectPageComponent } from "./components/pages/collection-select-page/collection-select-page.component";
import { SearchCriteriaPageComponent } from "./components/pages/search-criteria-page/search-criteria-page.component";
import { SelectComponent } from "./components/select/select.component";
import { SearchResultsComponent } from "./outlets/search-results/search-results.component";
import { RouterModule } from "@angular/router";

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
        CollectionSelectPageComponent,
        SearchCriteriaPageComponent,
        SelectComponent,
        SearchResultsComponent
    ],
    entryComponents: [
        SearchCriteriaComponent,
        SearchResultsComponent
    ],
    providers: [
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
