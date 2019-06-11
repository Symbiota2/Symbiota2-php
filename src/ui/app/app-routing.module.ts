import {NgModule} from '@angular/core';
import {Routes, RouterModule, Route} from '@angular/router';

import {HomeComponent} from './layout/home/home.component';
import {SearchComponent} from './search/search.component';

import {PluginLoaderService} from './plugin-loader.service';
import {PluginRouterService} from './plugin-router.service';

import {AuthGuard} from './auth/auth.guard';

const routes: Routes = [
    {path: '', component: HomeComponent},
    {path: 'searchcollections', component: SearchComponent}
];

@NgModule({
    imports: [RouterModule.forRoot(routes)],
    exports: [RouterModule],
    providers: [AuthGuard]
})
export class AppRoutingModule {
    pluginRoutes: Route[];

    constructor(
        private pluginLoader: PluginLoaderService,
        private pluginRouter: PluginRouterService
    ) {
        this.pluginLoader.loadedPluginRoutes.subscribe(value => {
            this.pluginRouter.activatePluginRoutes(value);
        });
    }
}
