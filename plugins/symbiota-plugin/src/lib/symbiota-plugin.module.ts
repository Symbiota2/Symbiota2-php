import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {SymbiotaSharedModule} from 'symbiota-shared';

import {PluginOutletComponent} from './outlets/plugin-outlet/plugin-outlet.component';

import {PluginRouterService} from './services/plugin-router.service';
import {PluginComponentService} from './services/plugin-component.service';
import {PluginTabService} from './services/plugin-tab.service';
import {PluginLinkService} from './services/plugin-link.service';

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
        PluginTabService,
        PluginLinkService
    ]
})
export class SymbiotaPluginModule {
}
