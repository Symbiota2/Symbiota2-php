import {NgModule} from '@angular/core';
import {Routes, RouterModule, Route} from '@angular/router';

import {HomeComponent} from './layout/home/home.component';

import {PluginLoaderService} from './plugin/plugin-loader.service';
import {PluginRouterService} from './plugin/plugin-router.service';

import {SymbiotaSpatialComponent} from 'symbiota-spatial';

import {AuthGuard} from './auth/auth.guard';

const routes: Routes = [
    {path: '', component: HomeComponent}
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
