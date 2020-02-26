import {NgModule} from '@angular/core';
import {TranslateModule} from "@ngx-translate/core";

import {SpatialRoutingModule} from './spatial-routing.module';
import {SymbiotaSharedModule} from 'symbiota-shared';

import {SpatialAnalysisComponent} from './containers/spatial-analysis/spatial-analysis.component';
import {MapSettingsDialogComponent} from './outlets/map-settings-dialog/map-settings-dialog.component';
import {MapLayersDialogComponent} from './components/map-layers-dialog/map-layers-dialog.component';
import {VectorToolsTabComponent} from './outlets/vector-tools-tab/vector-tools-tab.component';
import {PointToolsTabComponent} from './outlets/point-tools-tab/point-tools-tab.component';

import {MapService} from './services/map.service';
import {VectorToolsService} from './services/vector-tools.service';

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
        SymbiotaSharedModule,
        TranslateModule
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
