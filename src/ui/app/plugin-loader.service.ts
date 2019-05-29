import {Injectable, NgModuleFactory} from '@angular/core';
import {LoaderService} from './loader.service';
import {PLUGIN_EXTERNALS_MAP} from './plugin-externals';
import {PluginConfigService} from './plugin-config.service';

const SystemJs = window.System;

@Injectable()
export class PluginLoaderService extends LoaderService {
    constructor(private configProvider: PluginConfigService) {
        super();
    }

    provideExternals() {
        Object.keys(PLUGIN_EXTERNALS_MAP).forEach(externalKey =>
            window.define(externalKey, [], () => PLUGIN_EXTERNALS_MAP[externalKey])
        );
    }

    load<T>(pluginName): Promise<NgModuleFactory<T>> {
        const { config } = this.configProvider;
        if (!config[pluginName]) {
            throw Error(`Can't find appropriate plugin`);
        }

        console.log(config[pluginName].name);

        const depsPromises = (config[pluginName].deps || []).map(dep => {
            return SystemJs.import(config[dep].path).then(m => {
                window['define'](dep, [], () => m.default);
            });
        });

        if (typeof PLUGIN_EXTERNALS_MAP.shared === 'string') {
            depsPromises.push(SystemJs.import('/assets/plugins/shared.js').then(m => {
                PLUGIN_EXTERNALS_MAP.shared = m.default;
                window['define']('shared', [], () => m.default);
            }));
        }

        return Promise.all(depsPromises).then(() => {
            return SystemJs.import(config[pluginName].path).then(
                module => module.default.default
            );
        });
    }
}
