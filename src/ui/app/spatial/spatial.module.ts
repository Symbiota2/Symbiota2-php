import {NgModule} from '@angular/core';

import {SpatialRoutingModule} from './spatial-routing.module';
import {SymbiotaSharedModule} from 'symbiota-shared';

import {SpatialAnalysisComponent} from './spatial-analysis/spatial-analysis.component';

import {MapProviderService} from './map-provider.service';
import {SpatialToolsService} from './spatial-tools.service';

@NgModule({
    declarations: [
        SpatialAnalysisComponent
    ],
    imports: [
        SpatialRoutingModule,
        SymbiotaSharedModule
    ],
    providers: [
        MapProviderService,
        SpatialToolsService
    ]
})
export class SpatialModule { }
