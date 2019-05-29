"use strict";
Object.defineProperty(exports, "__esModule", {value: true});
const build_angular_1 = require("@angular-devkit/build-angular");
const fs = require("fs");
const operators_1 = require("rxjs/operators");

class PluginBuilder extends build_angular_1.BrowserBuilder {
    patchEntryPoint(contents) {
        fs.writeFileSync(this.entryPointPath, contents);
    }

    buildWebpackConfig(root, projectRoot, host, options) {
        const {pluginName, sharedLibs} = this.options;
        if (!this.options.modulePath) {
            throw Error('Please define modulePath!');
        }
        if (!pluginName) {
            throw Error('Please provide pluginName!');
        }
        const config = super.buildWebpackConfig(root, projectRoot, host, options);
        delete config.entry.polyfills;
        delete config.optimization.runtimeChunk;
        delete config.optimization.splitChunks;
        delete config.entry.styles;
        config.externals = {
            rxjs: 'rxjs',
            '@angular/core': 'ng.core',
            '@angular/common': 'ng.common',
            '@angular/forms': 'ng.forms',
            '@angular/router': 'ng.router',
            tslib: 'tslib'
        };
        if (sharedLibs) {
            config.externals = [config.externals];
            const sharedLibsArr = sharedLibs.split(',');
            sharedLibsArr.forEach(sharedLibName => {
                const factoryRegexp = new RegExp(`${sharedLibName}.ngfactory$`);
                config.externals[0][sharedLibName] = sharedLibName;
                config.externals.push((context, request, callback) => {
                    if (factoryRegexp.test(request)) {
                        return callback(null, sharedLibName);
                    }
                    callback();
                });
            });
        }
        const ngCompilerPluginInstance = config.plugins.find(x => x.constructor && x.constructor.name === 'AngularCompilerPlugin');
        if (ngCompilerPluginInstance) {
            ngCompilerPluginInstance._entryModule = this.options.modulePath;
        }
        this.entryPointPath = config.entry.main[0];
        const [modulePath, moduleName] = this.options.modulePath.split('#');
        const factoryPath = `${modulePath.includes('.') ? modulePath : `${modulePath}/${modulePath}`}.ngfactory`;
        const entryPointContents = `
            export * from '${modulePath}';
            export * from '${factoryPath}';
            import { ${moduleName}NgFactory } from '${factoryPath}';
            export default ${moduleName}NgFactory;
        `;
        this.patchEntryPoint(entryPointContents);
        config.output.filename = `${pluginName}.js`;
        config.output.library = pluginName;
        config.output.libraryTarget = 'umd';
        config.output.globalObject = `(typeof self !== 'undefined' ? self : this)`;
        return config;
    }

    run(builderConfig) {
        this.options = builderConfig.options;
        builderConfig.options.deleteOutputPath = false;
        return super.run(builderConfig).pipe(operators_1.tap(() => {
            this.patchEntryPoint('');
        }));
    }
}

exports.default = PluginBuilder;
