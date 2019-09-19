import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {SymbiotaPluginModule} from 'symbiota-plugin';
import {SymbiotaSharedModule} from 'symbiota-shared';

import {PluginLoaderService} from './plugin-loader.service';

@NgModule({
    declarations: [],
    imports: [
        CommonModule,
        SymbiotaPluginModule,
        SymbiotaSharedModule
    ],
    providers: [
        PluginLoaderService
    ]
})
export class SymbiotaPluginLoaderModule {
}
