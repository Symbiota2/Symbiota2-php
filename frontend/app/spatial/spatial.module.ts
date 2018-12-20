import {NgModule} from '@angular/core';

import {SharedModule} from "../shared/shared.module";

import {SpatialComponent} from "./spatial.component";

@NgModule({
    declarations: [
        SpatialComponent
    ],
    imports: [
        SharedModule
    ],
    exports: [
        SpatialComponent
    ],
    providers: [],
    bootstrap: [SpatialComponent]
})
export class LayoutModule {
}
