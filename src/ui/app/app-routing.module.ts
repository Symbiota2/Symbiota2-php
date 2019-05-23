import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';

import {HomeComponent} from './layout/home/home.component';
import {SpatialComponent} from './spatial/spatial.component';
import {SearchComponent} from './search/search.component';
import {AuthGuard} from './auth/auth.guard';

const routes: Routes = [
    {path: '', component: HomeComponent},
    {path: 'searchcollections', component: SearchComponent},
    {path: 'spatial', component: SpatialComponent},
];

@NgModule({
    imports: [RouterModule.forRoot(routes)],
    exports: [RouterModule],
    providers: [AuthGuard]
})
export class AppRoutingModule {}
