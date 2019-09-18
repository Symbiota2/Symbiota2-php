import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {TranslateModule} from "@ngx-translate/core";

import {SymbiotaPluginModule} from 'symbiota-plugin';

import {PluginLoaderService} from './plugin-loader.service';

@NgModule({
    declarations: [],
    imports: [
        CommonModule,
        SymbiotaPluginModule,
        TranslateModule
    ],
    exports: [],
    providers: [
        PluginLoaderService
    ]
})
export class SymbiotaPluginLoaderModule {
}
