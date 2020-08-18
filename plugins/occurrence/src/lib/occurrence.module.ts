import { NgModule } from "@angular/core";
import { TranslateModule } from "@ngx-translate/core";

import { SymbiotaAuthModule } from "symbiota-auth";
import { SymbiotaSharedModule } from "symbiota-shared";

@NgModule({
    declarations: [],
    exports: [],
    imports: [
        TranslateModule,
        SymbiotaAuthModule,
        SymbiotaSharedModule
    ]
})
export class OccurrenceModule {  }
