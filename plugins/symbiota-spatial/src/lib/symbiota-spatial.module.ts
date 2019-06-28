import {NgModule} from '@angular/core';

import {SpatialRoutingModule} from './spatial-routing.module';
import {SymbiotaSharedModule} from 'symbiota-shared';

import {SpatialAnalysisComponent} from './spatial-analysis/spatial-analysis.component';

import {MapService} from './map.service';
import {VectorToolsService} from './vector-tools.service';

@NgModule({
    declarations: [
        SpatialAnalysisComponent
    ],
    imports: [
        SpatialRoutingModule,
        SymbiotaSharedModule
    ],
    providers: [
        MapService,
        VectorToolsService
    ]
})
export class SymbiotaSpatialModule {
}
