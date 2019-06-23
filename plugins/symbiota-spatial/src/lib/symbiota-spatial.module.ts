import {NgModule} from '@angular/core';

import {SpatialRoutingModule} from './spatial-routing.module';

import {SpatialAnalysisComponent} from './spatial-analysis/spatial-analysis.component';

import {MapProviderService} from './map-provider.service';

@NgModule({
    declarations: [
        SpatialAnalysisComponent
    ],
    imports: [
        SpatialRoutingModule
    ],
    providers: [
        MapProviderService
    ]
})
export class SymbiotaSpatialModule {
}
