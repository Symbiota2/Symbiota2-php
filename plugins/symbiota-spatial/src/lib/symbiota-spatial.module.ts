import {NgModule} from '@angular/core';

import {SpatialRoutingModule} from './spatial-routing.module';
import {SymbiotaSharedModule} from 'symbiota-shared';

import {SpatialAnalysisComponent} from './spatial-analysis/spatial-analysis.component';
import {MapSettingsDialogComponent} from './map-settings-dialog/map-settings-dialog.component';
import {MapLayersDialogComponent} from './map-layers-dialog/map-layers-dialog.component';

import {MapService} from './map.service';
import {VectorToolsService} from './vector-tools.service';

@NgModule({
    declarations: [
        SpatialAnalysisComponent,
        MapSettingsDialogComponent,
        MapLayersDialogComponent
    ],
    imports: [
        SpatialRoutingModule,
        SymbiotaSharedModule
    ],
    providers: [
        MapService,
        VectorToolsService
    ],
    entryComponents: [
        MapSettingsDialogComponent,
        MapLayersDialogComponent
    ]
})
export class SymbiotaSpatialModule {
}
