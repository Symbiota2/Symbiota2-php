import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';

import {PluginAdminComponent} from './components/plugin-admin/plugin-admin.component';
import {PluginInstallerComponent} from './components/plugin-installer/plugin-installer.component';

const routes: Routes = [
    { path: 'pluginadmin', component: PluginAdminComponent },
    { path: 'plugininstaller', component: PluginInstallerComponent }
];

@NgModule({
    imports: [
        RouterModule.forChild(routes)
    ],
    exports: [RouterModule]
})
export class PluginRoutingModule {
}
