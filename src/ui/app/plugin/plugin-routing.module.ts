import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';

import {PluginAdminComponent} from './plugin-admin/plugin-admin.component';

const routes: Routes = [
    { path: 'pluginadmin', component: PluginAdminComponent }
];

@NgModule({
    imports: [
        RouterModule.forChild(routes)
    ],
    exports: [RouterModule]
})
export class PluginRoutingModule {
}
