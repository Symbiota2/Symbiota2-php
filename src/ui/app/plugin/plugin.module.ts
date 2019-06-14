import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {PluginOutletComponent} from './plugin-outlet.component';

import {PluginLoaderService} from './plugin-loader.service';
import {PluginRouterService} from './plugin-router.service';

@NgModule({
    declarations: [
        PluginOutletComponent
    ],
    imports: [
        CommonModule
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
