import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';

import {SpatialAnalysisComponent} from './spatial-analysis/spatial-analysis.component';

const routes: Routes = [
    {path: 'spatial', component: SpatialAnalysisComponent, data: {fullWindow: true}}
];

@NgModule({
    imports: [
        RouterModule.forChild(routes)
    ],
    exports: [RouterModule]
})
export class SpatialRoutingModule {
}
