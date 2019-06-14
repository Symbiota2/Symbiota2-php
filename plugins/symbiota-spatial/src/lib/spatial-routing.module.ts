import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';

import {SymbiotaSpatialComponent} from './symbiota-spatial.component';

const routes: Routes = [
    {path: 'spatial', component: SymbiotaSpatialComponent}
];

@NgModule({
    imports: [
        RouterModule.forChild(routes)
    ],
    exports: [RouterModule]
})
export class SpatialRoutingModule {
}
