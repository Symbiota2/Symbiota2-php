import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';

import {SymbiotaSpatialComponent} from './symbiota-spatial/symbiota-spatial.component';

const routes: Routes = [
    {path: 'spatial', component: SymbiotaSpatialComponent, data: {fullWindow: true}}
];

@NgModule({
    imports: [
        RouterModule.forChild(routes)
    ],
    exports: [RouterModule]
})
export class SpatialRoutingModule {
}
