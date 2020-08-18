import { NgModule } from "@angular/core";
import { TranslateModule } from "@ngx-translate/core";

import { CollectionModule } from "collection";
import { SymbiotaAuthModule } from "symbiota-auth";
import { SymbiotaSharedModule } from "symbiota-shared";
import { OccurrenceModule } from "occurrence";

import { SearchCriteriaComponent } from "./outlets/search-criteria/search-criteria.component";
import { CollectionSelectPageComponent } from "./components/pages/collection-select-page/collection-select-page.component";
import { SearchCriteriaPageComponent } from "./components/pages/search-criteria-page/search-criteria-page.component";
import { SearchResultsPageComponent } from "./components/pages/search-results-page/search-results-page.component";
import { SelectComponent } from "./components/select/select.component";

@NgModule({
    imports: [
        TranslateModule,
        CollectionModule,
        SymbiotaAuthModule,
        SymbiotaSharedModule,
        OccurrenceModule
    ],
    declarations: [
        SearchCriteriaComponent,
        CollectionSelectPageComponent,
        SearchCriteriaPageComponent,
        SearchResultsPageComponent,
        SelectComponent
    ],
    entryComponents: [
        SearchCriteriaComponent
    ],
    providers: [
        {
            provide: "search-criteria",
            useValue: [{
                name: "occurrence-search-search-criteria",
                component: SearchCriteriaComponent
            }],
            multi: true
        }
    ]
})
export class OccurrenceSearchModule { }
