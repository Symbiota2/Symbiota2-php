import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {TranslateModule} from "@ngx-translate/core";

import {SymbiotaSharedModule} from 'symbiota-shared';

import {PluginRoutingModule} from './plugin-routing.module';

import {PluginAdminComponent} from './components/plugin-admin/plugin-admin.component';
import {PluginDependencyDialogComponent} from './components/plugin-dependency-dialog/plugin-dependency-dialog.component';
import {PluginInstallerComponent} from './components/plugin-installer/plugin-installer.component';
import {AlterDatabaseWarningDialogComponent} from './components/alter-database-warning-dialog/alter-database-warning-dialog.component';

@NgModule({
    declarations: [
        PluginAdminComponent,
        PluginDependencyDialogComponent,
        PluginInstallerComponent,
        AlterDatabaseWarningDialogComponent
    ],
    imports: [
        CommonModule,
        SymbiotaSharedModule,
        PluginRoutingModule,
        TranslateModule
    ],
    entryComponents: [
        PluginDependencyDialogComponent,
        AlterDatabaseWarningDialogComponent
    ]
})
export class PluginModule {
}
