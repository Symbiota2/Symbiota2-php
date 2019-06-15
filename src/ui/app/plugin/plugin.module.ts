import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {PluginRoutingModule} from './plugin-routing.module';

import {PluginOutletComponent} from './plugin-outlet/plugin-outlet.component';
import {PluginAdminComponent} from './plugin-admin/plugin-admin.component';

import {PluginLoaderService} from './plugin-loader.service';
import {PluginRouterService} from './plugin-router.service';

@NgModule({
    declarations: [
        PluginOutletComponent,
        PluginAdminComponent
    ],
    imports: [
        CommonModule,
        PluginRoutingModule
    ],
    entryComponents: [
        PluginOutletComponent
    ],
    providers: [
        PluginLoaderService,
        PluginRouterService
    ]
})
export class PluginModule {
}
