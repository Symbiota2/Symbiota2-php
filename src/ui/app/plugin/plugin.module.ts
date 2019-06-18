import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {SymbiotaSharedModule} from 'symbiota-shared';

import {PluginRoutingModule} from './plugin-routing.module';

import {PluginOutletComponent} from './plugin-outlet/plugin-outlet.component';
import {PluginAdminComponent} from './plugin-admin/plugin-admin.component';
import {PluginDependencyDialogComponent} from './plugin-dependency-dialog/plugin-dependency-dialog.component';

import {PluginLoaderService} from './plugin-loader.service';
import {PluginRouterService} from './plugin-router.service';
import {PluginInstallerService} from './plugin-installer.service';

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
    providers: [
        PluginLoaderService,
        PluginRouterService,
        PluginInstallerService
    ]
})
export class PluginModule {
}