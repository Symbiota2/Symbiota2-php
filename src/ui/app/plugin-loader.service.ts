import {Observable} from 'rxjs';
import {PluginData} from './plugin-data.model';
import {HttpClient} from '@angular/common/http';
import {Injectable, Compiler} from '@angular/core';
import {BehaviorSubject} from 'rxjs';
import {Route} from '@angular/router';

import {PluginOutletComponent} from './plugin-outlet.component';

import * as AngularCore from '@angular/core';
import * as AngularCommon from '@angular/common';
import * as AngularRouter from '@angular/router';
import * as BrowserAnimations from '@angular/platform-browser/animations';

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

    loadPluginData(): Observable<PluginData[]> {
        return this.http.get<PluginData[]>('./assets/modules.json');
    }

    initialize(): Promise<any> {
        return new Promise<any>(resolve => {
            this.http.get('./assets/modules.json').subscribe(
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
        const url = './assets/' + plugin.file;
        SystemJS.set('@angular/core', SystemJS.newModule(AngularCore));
        SystemJS.set('@angular/common', SystemJS.newModule(AngularCommon));
        SystemJS.set('@angular/router', SystemJS.newModule(AngularRouter));
        SystemJS.set('@angular/platform-browser/animations', SystemJS.newModule(BrowserAnimations));

        return SystemJS.import(`${url}`).then((loadedPlugin) => {
            return this.compiler.compileModuleAndAllComponentsSync(loadedPlugin[`${plugin.module}`]);
        });
    }

    enableDisablePlugin(plugin: PluginData) {
        if (this.pluginIsLoaded(plugin.name)) {
            // this.pluginRouterService.unRegisterRoute(plugin.name);
        } else {
            this.loadPlugin(plugin);
        }
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
