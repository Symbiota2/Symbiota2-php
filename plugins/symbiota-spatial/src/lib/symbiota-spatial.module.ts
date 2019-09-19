import {NgModule} from '@angular/core';

import {SpatialRoutingModule} from './spatial-routing.module';
import {SymbiotaSharedModule} from 'symbiota-shared';

import {SpatialAnalysisComponent} from './spatial-analysis/spatial-analysis.component';
import {MapSettingsDialogComponent} from './map-settings-dialog/map-settings-dialog.component';
import {MapLayersDialogComponent} from './map-layers-dialog/map-layers-dialog.component';
import {VectorToolsTabComponent} from './vector-tools-tab/vector-tools-tab.component';
import {PointToolsTabComponent} from './point-tools-tab/point-tools-tab.component';

import {MapService} from './map.service';
import {VectorToolsService} from './vector-tools.service';

@NgModule({
    declarations: [
        SpatialAnalysisComponent,
        MapSettingsDialogComponent,
        MapLayersDialogComponent,
        VectorToolsTabComponent,
        PointToolsTabComponent
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
        MapLayersDialogComponent,
        VectorToolsTabComponent,
        PointToolsTabComponent
    ]
})
export class SymbiotaSpatialModule {
}
