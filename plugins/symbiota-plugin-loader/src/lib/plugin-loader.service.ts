import {Injectable, Compiler} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Route} from '@angular/router';
import {Observable, BehaviorSubject} from 'rxjs';
import {TranslateService} from '@ngx-translate/core';

import {PluginOutletComponent} from 'symbiota-plugin';

import {PluginTabService} from 'symbiota-plugin';
import {PluginComponentService} from 'symbiota-plugin';
import {PluginLinkService} from 'symbiota-plugin';
import {SpinnerOverlayService} from 'symbiota-shared';
import {AlertService} from 'symbiota-shared';
import {ConfigurationService} from 'symbiota-shared';

import {Plugin} from './interfaces/plugin.interface';

import * as AngularCdkCollections from '@angular/cdk/collections';
import * as AngularCdkTree from '@angular/cdk/tree';
import * as AngularCommon from '@angular/common';
import * as AngularCore from '@angular/core';
import * as AngularFlexLayout from '@angular/flex-layout';
import * as AngularForms from '@angular/forms';
import * as AngularMaterial from '@angular/material';
import * as AngularMaterialTree from '@angular/material/tree';
import * as AngularBrowser from '@angular/platform-browser';
import * as AngularBrowserAnimations from '@angular/platform-browser/animations';
import * as AngularRouter from '@angular/router';
import * as NgrxStore from '@ngrx/store';
import * as NgxTranslateCore from '@ngx-translate/core';
import * as Rxjs from 'rxjs';
import * as RxjsOperators from 'rxjs/operators';
import * as SymbiotaAuth from 'symbiota-auth';
import * as SymbiotaPlugin from 'symbiota-plugin';
import * as SymbiotaShared from 'symbiota-shared';
import * as SymbiotaSpatial from 'symbiota-spatial';

declare var SystemJS: any;

@Injectable({
    providedIn: 'root'
})
export class PluginLoaderService {

    loadedPlugins = new BehaviorSubject<string[]>([]);
    private pluginRoutes = new BehaviorSubject<Route[]>([]);
    public readonly loadedPluginRoutes: Observable<Route[]> = this.pluginRoutes.asObservable();
    pluginData: any;
    configurations_failed: string;

    constructor(
        private tabsService: PluginTabService,
        private componentService: PluginComponentService,
        private linkService: PluginLinkService,
        private compiler: Compiler,
        private http: HttpClient,
        private alertService: AlertService,
        private spinnerService: SpinnerOverlayService,
        private translate: TranslateService,
        private configService: ConfigurationService
    ) {
        this.configService.selectedLanguageValue.subscribe(value => {
            this.setTranslations();
        });
    }

    initialize(): Promise<any> {
        return new Promise<any>(resolve => {
            this.http.get('/api/pluginconfigurations').subscribe(
                (res) => {
                    this.pluginData = res;
                    this.resolvePluginDependencies();
                    resolve(this.pluginData);
                },
                (error) => {
                    this.spinnerService.hide();
                    this.alertService.showErrorSnackbar(
                        this.configurations_failed,
                        '',
                        5000
                    );
                    console.log(error);
                    resolve(this.pluginData);
                }
            );
        });
    }

    setTranslations() {
        this.translate.get('symbiota-plugin-loader.plugin-loader-service.configurations_failed').subscribe((res: string) => {
            this.configurations_failed = res;
        });
    }

    resolvePluginDependencies() {
        this.pluginData.forEach((plugin, index) => {
            if (plugin.enabled && plugin.ui_filename && plugin.dependencies) {
                plugin.dependencies.forEach((depName, index2) => {
                    const dep = this.pluginData.find(x => x.name === depName);
                    if (dep.enabled && dep.ui_filename && dep.dependencies) {
                        dep.dependencies.forEach((secDepName, index3) => {
                            const secDep = this.pluginData.find(x => x.name === secDepName);
                            if (!this.pluginIsLoaded(secDep.name)) {
                                this.loadPlugin(secDep);
                            }
                        });
                    }
                    if (dep.enabled && dep.ui_filename && !this.pluginIsLoaded(dep.name)) {
                        this.loadPlugin(dep);
                    }
                });
            }
        });
        this.loadPlugins();
    }

    loadPlugins() {
        this.pluginData.forEach((plugin, index) => {
            if (plugin.enabled && plugin.ui_filename && !this.pluginIsLoaded(plugin.name)) {
                this.loadPlugin(plugin);
            }
        });
    }

    private loadPlugin(plugin: Plugin) {
        this.activatePlugin(plugin);
        if (!!plugin.ui_routes) {
            this.collectPluginRoutes(plugin);
        }
        if (!!plugin.tab_hooks) {
            this.tabsService.loadPluginTabs(plugin.tab_hooks, plugin.ui_filename, plugin.ui_module_name);
        }
        if (!!plugin.component_hooks) {
            this.componentService.loadPluginComponents(plugin.component_hooks, plugin.ui_filename, plugin.ui_module_name);
        }
        if (!!plugin.link_hooks) {
            this.linkService.loadPluginLinks(plugin.link_hooks);
        }
        this.addPluginToLoadedPluginList(plugin.name);
    }

    collectPluginRoutes(plugin: Plugin) {
        const routes = plugin.ui_routes;
        const moduleName = plugin.ui_module_name;
        let route: Route = {};

        routes.forEach((rt, index) => {
            let routeData = {};
            const data = {
                file: plugin.ui_filename,
                module: plugin.ui_module_name,
                provider: rt.provider
            };

            if (rt.data) {
                routeData = Object.assign({}, data, rt.data);
            } else {
                routeData = Object.assign({}, data);
            }

            if (rt.children) {
                const routeChildren: Route[] = [];
                const children = rt.children;
                let childRoute: Route = {};

                children.forEach((childrt, index2) => {
                    let childRouteData = {};
                    const childData = {
                        file: plugin.ui_filename,
                        module: plugin.ui_module_name,
                        provider: childrt.provider
                    };

                    if (childrt.data) {
                        childRouteData = Object.assign({}, data, childrt.data);
                    } else {
                        childRouteData = Object.assign({}, data);
                    }

                    if (childrt.redirectTo) {
                        childRoute = {
                            path: childrt.path,
                            redirectTo: childrt.redirectTo
                        };
                    } else {
                        childRoute = {
                            path: childrt.path,
                            component: PluginOutletComponent,
                            data: childRouteData
                        };
                    }
                    routeChildren.push(childRoute);
                });
                route = {
                    path: rt.path,
                    component: PluginOutletComponent,
                    data: routeData,
                    children: routeChildren
                };
            } else {
                if (rt.redirectTo) {
                    route = {
                        path: rt.path,
                        redirectTo: rt.redirectTo
                    };
                } else {
                    route = {
                        path: rt.path,
                        component: PluginOutletComponent,
                        data: routeData
                    };
                }
            }

            this.addRouteToLoadedRouteList(route);
        });
    }

    activatePlugin(plugin: Plugin): Promise<any> {
        const url = './assets/js/plugins/' + plugin.ui_filename;
        SystemJS.set('@angular/cdk/collections', SystemJS.newModule(AngularCdkCollections));
        SystemJS.set('@angular/cdk/tree', SystemJS.newModule(AngularCdkTree));
        SystemJS.set('@angular/common', SystemJS.newModule(AngularCommon));
        SystemJS.set('@angular/core', SystemJS.newModule(AngularCore));
        SystemJS.set('@angular/flex-layout', SystemJS.newModule(AngularFlexLayout));
        SystemJS.set('@angular/forms', SystemJS.newModule(AngularForms));
        SystemJS.set('@angular/material', SystemJS.newModule(AngularMaterial));
        SystemJS.set('@angular/material/tree', SystemJS.newModule(AngularMaterialTree));
        SystemJS.set('@angular/platform-browser', SystemJS.newModule(AngularBrowser));
        SystemJS.set('@angular/platform-browser/animations', SystemJS.newModule(AngularBrowserAnimations));
        SystemJS.set('@angular/router', SystemJS.newModule(AngularRouter));
        SystemJS.set('@ngrx/store', SystemJS.newModule(NgrxStore));
        SystemJS.set('@ngx-translate/core', SystemJS.newModule(NgxTranslateCore));
        SystemJS.set('rxjs', SystemJS.newModule(Rxjs));
        SystemJS.set('rxjs/operators', SystemJS.newModule(RxjsOperators));
        SystemJS.set('symbiota-auth', SystemJS.newModule(SymbiotaAuth));
        SystemJS.set('symbiota-plugin', SystemJS.newModule(SymbiotaPlugin));
        SystemJS.set('symbiota-shared', SystemJS.newModule(SymbiotaShared));
        SystemJS.set('symbiota-spatial', SystemJS.newModule(SymbiotaSpatial));

        return SystemJS.import(`${url}`).then((loadedPlugin) => {
            return this.compiler.compileModuleAndAllComponentsSync(loadedPlugin[`${plugin.ui_module_name}`]);
        });
    }

    addRouteToLoadedRouteList(route: Route) {
        const currentList = (this.pluginRoutes ? this.pluginRoutes.value : []);
        const updatedList = (currentList ? [...currentList, route] : [route]);
        this.pluginRoutes.next(updatedList);
    }

    pluginIsLoaded(name: string) {
        const loadedList = (this.loadedPlugins ? this.loadedPlugins.value : []);
        return loadedList.includes(name);
    }

    addPluginToLoadedPluginList(name) {
        const currentList = (this.loadedPlugins ? this.loadedPlugins.value : []);
        const updatedList = (currentList ? [...currentList, name] : [name]);
        this.loadedPlugins.next(updatedList);
    }

    removePluginFromLoadedPluginList(name) {
        const currentList = (this.loadedPlugins ? this.loadedPlugins.value : []);
        currentList.forEach((plugin, index) => {
            if (plugin === name) { currentList.splice(index, 1); }
        });
        this.loadedPlugins.next(currentList);
    }

}
