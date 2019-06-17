import {NgModule} from '@angular/core';

import {SpatialRoutingModule} from './spatial-routing.module';

import {SymbiotaSpatialComponent} from './symbiota-spatial/symbiota-spatial.component';

@NgModule({
    declarations: [
        SymbiotaSpatialComponent
    ],
    imports: [
        SpatialRoutingModule
    ],
    exports: [
        SymbiotaSpatialComponent
    ],
    bootstrap: [SymbiotaSpatialComponent]
})
export class SymbiotaSpatialModule {
}
