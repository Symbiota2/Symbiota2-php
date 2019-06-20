import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {SymbiotaSharedModule} from 'symbiota-shared';

import {PluginRoutingModule} from './plugin-routing.module';

import {PluginOutletComponent} from './plugin-outlet/plugin-outlet.component';
import {PluginAdminComponent} from './plugin-admin/plugin-admin.component';
import {PluginDependencyDialogComponent} from './plugin-dependency-dialog/plugin-dependency-dialog.component';

import {PluginLoaderService} from './plugin-loader.service';
import {PluginRouterService} from './plugin-router.service';
import {PluginComponentService} from './plugin-component.service';
import {PluginTabService} from './plugin-tab.service';

@NgModule({
    declarations: [
        PluginOutletComponent,
        PluginAdminComponent,
        PluginDependencyDialogComponent
    ],
    imports: [
        CommonModule,
        PluginRoutingModule,
        SymbiotaSharedModule
    ],
    entryComponents: [
        PluginOutletComponent,
        PluginDependencyDialogComponent
    ],
    exports: [
        PluginOutletComponent
    ],
    providers: [
        PluginLoaderService,
        PluginRouterService,
        PluginComponentService,
        PluginTabService
    ]
})
export class PluginModule {
}
