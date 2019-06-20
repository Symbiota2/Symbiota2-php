import {Injectable, Injector, NgModuleFactory, Type, Compiler} from '@angular/core';
import {BehaviorSubject, Observable} from 'rxjs';

declare const SystemJS: any;

export interface TabData {
    tab_text: string;
    index: number;
    component: any;
    moduleFactory?: NgModuleFactory<any>;
    injector?: Injector;
}

@Injectable({
    providedIn: 'root'
})
export class PluginTabService {
    private tabDataSubject = new BehaviorSubject<TabData[]>([]);
    pluginTabs = {};

    constructor(
        private injector: Injector,
        private compiler: Compiler
    ) {}

    get tabData$(): Observable<TabData[]> {
        return this.tabDataSubject.asObservable();
    }

    loadPluginTabs(tabsArr, filename) {
        tabsArr.forEach((tab, index) => {
            tab.filename = filename;
            const outlet = tab.outlet.toString();
            if (!this.pluginTabs[outlet]) {
                this.pluginTabs[outlet] = [];
            }
            this.pluginTabs[outlet].push(tab);
        });
    }

    /* initializeTabs(outlet: string, coreTabs: any) {
        this.tabDataSubject.next([]);
        const outletTabs = this.getOutletTabs(outlet);
        coreTabs.forEach((tab, index) => {
            outletTabs.push(tab);
        });
        outletTabs.forEach((tab, index) => {
            this.setTab(tab);
        });
        this.sortTabData();
    } */

    getOutletTabs(outlet: string) {
        return (this.pluginTabs[outlet] ? this.pluginTabs[outlet] : []);
    }

    /* private setTab(tab: any) {
        let newTabItem: TabData;
        if (tab.component) {
            newTabItem = {
                tab_text: tab.tab_text,
                index: tab.index,
                component: tab.component
            };
        } else {
            // const module = await SystemJS.import('assets/js/plugins/' + tab.filename);
            const module = this.pluginLoader.pluginModules[tab.filename];
            console.log(module);
            const moduleFactory = this.compiler.compileModuleSync<any>(module[tab.module]);
            const moduleRef = moduleFactory.create(this.injector);
            const componentProvider = moduleRef.injector.get(tab.provider);
            const componentFactory = moduleRef.componentFactoryResolver.resolveComponentFactory<any>(
                componentProvider[0][0].component
            );
            newTabItem = {
                tab_text: tab.tab_text,
                index: tab.index,
                component: componentFactory,
                moduleFactory: moduleFactory,
                injector: this.injector
            };
        }
        this.addTabToTabData(newTabItem);
    } */

    setTab(module: any, tab: any) {
        const moduleFactory = this.compiler.compileModuleSync<any>(module[tab.module]);
        const moduleRef = moduleFactory.create(this.injector);
        const componentProvider = moduleRef.injector.get(tab.provider);
        const componentFactory = moduleRef.componentFactoryResolver.resolveComponentFactory<any>(
            componentProvider[0][0].component
        );
        return {
            tab_text: tab.tab_text,
            index: tab.index,
            component: componentFactory,
            moduleFactory: moduleFactory,
            injector: this.injector
        };
    }

    addTabToTabData(tab: TabData) {
        const currentData = (this.tabDataSubject ? this.tabDataSubject.value : []);
        const updatedData = (currentData ? [...currentData, tab] : [tab]);
        this.tabDataSubject.next(updatedData);
    }

    sortTabData() {
        const tabData = (this.tabDataSubject ? this.tabDataSubject.value : []);
        tabData.sort((a, b) => a.index - b.index);
        console.log('sort happening');
        this.tabDataSubject.next(tabData);
    }

}
