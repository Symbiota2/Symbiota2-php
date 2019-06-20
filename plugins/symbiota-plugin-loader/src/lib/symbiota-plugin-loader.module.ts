import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {SymbiotaPluginModule} from 'symbiota-plugin';

import {PluginLoaderService} from './plugin-loader.service';

@NgModule({
    declarations: [],
    imports: [
        CommonModule,
        SymbiotaPluginModule
    ],
    exports: [],
    providers: [
        PluginLoaderService
    ]
})
export class SymbiotaPluginLoaderModule {
}
