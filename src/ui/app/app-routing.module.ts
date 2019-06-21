import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';

import {HomeComponent} from './layout/home/home.component';
import {SitemapComponent} from './layout/sitemap/sitemap.component';

import {PluginLoaderService} from 'symbiota-plugin-loader';
import {PluginRouterService} from 'symbiota-plugin';

const routes: Routes = [
    {path: '', component: HomeComponent},
    {path: 'sitemap', component: SitemapComponent}
];

@NgModule({
    imports: [
        RouterModule.forRoot(routes)
    ],
    exports: [
        RouterModule
    ]
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
