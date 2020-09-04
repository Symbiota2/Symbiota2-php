import { NgModule } from "@angular/core";
import { TranslateModule } from "@ngx-translate/core";

import { SymbiotaAuthModule } from "symbiota-auth";
import { SymbiotaSharedModule } from "symbiota-shared";
import {CollectionModule} from "collection";

@NgModule({
    declarations: [],
    exports: [],
    imports: [
        TranslateModule,
        SymbiotaAuthModule,
        SymbiotaSharedModule,
        CollectionModule
    ]
})
export class OccurrenceModule {  }
