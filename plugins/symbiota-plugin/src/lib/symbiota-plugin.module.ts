import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {SymbiotaSharedModule} from 'symbiota-shared';

import {PluginOutletComponent} from './plugin-outlet/plugin-outlet.component';

import {PluginRouterService} from './plugin-router.service';
import {PluginComponentService} from './plugin-component.service';
import {PluginTabService} from './plugin-tab.service';

@NgModule({
    declarations: [
        PluginOutletComponent
    ],
    imports: [
        CommonModule,
        SymbiotaSharedModule
    ],
    entryComponents: [
        PluginOutletComponent
    ],
    exports: [
        PluginOutletComponent
    ],
    providers: [
        PluginRouterService,
        PluginComponentService,
        PluginTabService
    ]
})
export class SymbiotaPluginModule {
}
