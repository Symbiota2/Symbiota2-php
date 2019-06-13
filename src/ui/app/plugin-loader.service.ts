import {Observable} from 'rxjs';
import {PluginData} from './plugin-data.model';
import {HttpClient} from '@angular/common/http';
import {Injectable, Compiler} from '@angular/core';
import {BehaviorSubject} from 'rxjs';
import {Route} from '@angular/router';

import {PluginOutletComponent} from './plugin-outlet.component';

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
import * as OlLayer from 'ol/layer.js';
import * as OlMap from 'ol/Map.js';
import * as OlOverlay from 'ol/Overlay.js';
import * as OlProject from 'ol/proj.js';
import * as OlSource from 'ol/source.js';
import * as OlStyle from 'ol/style.js';
import * as OlVector from 'ol/layer/Vector.js';
import * as OlView from 'ol/View.js';
import * as OlXyz from 'ol/source/XYZ.js';
import * as Rxjs from 'rxjs';
import * as RxjsOperators from 'rxjs/operators';

declare var SystemJS: any;

@Injectable({
    providedIn: 'root'
})
export class PluginLoaderService {
    loadedPlugins: BehaviorSubject<string[]> = new BehaviorSubject<string[]>([]);
    private pluginRoutes: BehaviorSubject<Route[]> = new BehaviorSubject<Route[]>([]);
    public readonly loadedPluginRoutes: Observable<Route[]> = this.pluginRoutes.asObservable();
    pluginData: any;
    errorMessage: string;
    errorVisible = false;

    constructor(
        private compiler: Compiler,
        private http: HttpClient
    ) {}

    initialize(): Promise<any> {
        return new Promise<any>(resolve => {
            this.http.get('/api/pluginconfigurations').subscribe(
                (res) => {
                    this.pluginData = res;
                    this.resolvePluginDependencies();
                    resolve(this.pluginData);
                },
                (error) => {
                    console.log(error);
                }
            );
        });
    }

    resolvePluginDependencies() {
        this.pluginData.forEach((plugin, index) => {
            if (plugin.dependencies) {
                plugin.dependencies.forEach((depName, index2) => {
                    const dep = this.pluginData.find(x => x.name === depName);
                    if (dep.dependencies) {
                        dep.dependencies.forEach((secDepName, index3) => {
                            const secDep = this.pluginData.find(x => x.name === secDepName);
                            if (!this.pluginIsLoaded(secDep.name)) {
                                this.loadPlugin(secDep);
                            }
                        });
                    }
                    if (!this.pluginIsLoaded(dep.name)) {
                        this.loadPlugin(dep);
                    }
                });
            }
        });
        this.loadPlugins();
    }

    loadPlugins() {
        this.pluginData.forEach((plugin, index) => {
            if (!this.pluginIsLoaded(plugin.name)) {
                this.loadPlugin(plugin);
            }
        });
    }

    private loadPlugin(plugin: PluginData) {
        this.activatePlugin(plugin);
        this.collectPluginRoutes(plugin);
        this.addPluginToLoadedPluginList(plugin.name);
    }

    collectPluginRoutes(plugin: PluginData) {
        if (plugin.routes) {
            const routes = plugin.routes;
            const moduleName = plugin.module;
            let route: Route = {};

            routes.forEach((rt, index) => {
                if (rt.children) {
                    const routeChildren: Route[] = [];
                    const children = rt.children;
                    let childRoute: Route = {};

                    children.forEach((childrt, index2) => {
                        if (childrt.redirectTo) {
                            childRoute = {
                                path: childrt.path,
                                redirectTo: childrt.redirectTo
                            };
                        } else {
                            childRoute = {
                                path: childrt.path,
                                component: PluginOutletComponent,
                                data: {
                                    file: plugin.file,
                                    module: plugin.module,
                                    provider: childrt.provider
                                }
                            };
                        }
                        routeChildren.push(childRoute);
                    });
                    route = {
                        path: rt.path,
                        component: PluginOutletComponent,
                        data: {
                            file: plugin.file,
                            module: plugin.module,
                            provider: rt.provider
                        },
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
                            data: {
                                file: plugin.file,
                                module: plugin.module,
                                provider: rt.provider
                            }
                        };
                    }
                }

                this.addRouteToLoadedRouteList(route);
            });
        }
    }

    activatePlugin(plugin: PluginData): Promise<any> {
        const url = './assets/js/plugins/' + plugin.file;
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
        SystemJS.set('ol/layer', SystemJS.newModule(OlLayer));
        SystemJS.set('ol/Map', SystemJS.newModule(OlMap));
        SystemJS.set('ol/Overlay', SystemJS.newModule(OlOverlay));
        SystemJS.set('ol/proj', SystemJS.newModule(OlProject));
        SystemJS.set('ol/source', SystemJS.newModule(OlSource));
        SystemJS.set('ol/style', SystemJS.newModule(OlStyle));
        SystemJS.set('ol/layer/Vector', SystemJS.newModule(OlVector));
        SystemJS.set('ol/View', SystemJS.newModule(OlView));
        SystemJS.set('ol/source/XYZ', SystemJS.newModule(OlXyz));
        SystemJS.set('rxjs', SystemJS.newModule(Rxjs));
        SystemJS.set('rxjs/operators', SystemJS.newModule(RxjsOperators));

        return SystemJS.import(`${url}`).then((loadedPlugin) => {
            return this.compiler.compileModuleAndAllComponentsSync(loadedPlugin[`${plugin.module}`]);
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

    private showError(message: string, err) {
        this.errorMessage = message;
        this.errorVisible = true;
        console.log(err);
    }

    closeError() {
        this.errorVisible = false;
    }
}
