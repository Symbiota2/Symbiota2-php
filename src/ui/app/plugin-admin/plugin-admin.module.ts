import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {TranslateModule} from "@ngx-translate/core";

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
        PluginAdminRoutingModule,
        TranslateModule
    ],
    entryComponents: [
        PluginDependencyDialogComponent
    ]
})
export class PluginAdminModule {
}
