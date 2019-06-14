import {NgModule} from '@angular/core';
import {Routes, RouterModule, Route} from '@angular/router';

import {HomeComponent} from './layout/home/home.component';
import {SitemapComponent} from './layout/sitemap/sitemap.component';

import {PluginLoaderService} from './plugin/plugin-loader.service';
import {PluginRouterService} from './plugin/plugin-router.service';

import {AuthGuard} from './auth.guard';

const routes: Routes = [
    {path: '', component: HomeComponent},
    {path: 'sitemap', component: SitemapComponent}
];

@NgModule({
    imports: [RouterModule.forRoot(routes)],
    exports: [RouterModule],
    providers: [AuthGuard]
})
export class AppRoutingModule {

    constructor(
        private pluginLoader: PluginLoaderService,
        private pluginRouter: PluginRouterService
    ) {
        this.pluginLoader.loadedPluginRoutes.subscribe(value => {
            this.pluginRouter.activatePluginRoutes(value);
        });
    }
}
