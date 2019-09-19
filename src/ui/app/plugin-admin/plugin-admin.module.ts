import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {SymbiotaSharedModule} from 'symbiota-shared';

import {PluginAdminRoutingModule} from './plugin-admin-routing.module';

import {PluginAdminComponent} from './plugin-admin/plugin-admin.component';
import {PluginDependencyDialogComponent} from './plugin-dependency-dialog/plugin-dependency-dialog.component';

@NgModule({
    declarations: [
        PluginAdminComponent,
        PluginDependencyDialogComponent
    ],
    imports: [
        CommonModule,
        SymbiotaSharedModule,
        PluginAdminRoutingModule
    ],
    entryComponents: [
        PluginDependencyDialogComponent
    ]
})
export class PluginAdminModule {
}
