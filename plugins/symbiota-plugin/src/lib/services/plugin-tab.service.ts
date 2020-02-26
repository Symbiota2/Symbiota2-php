import {Injectable} from '@angular/core';

@Injectable({
    providedIn: 'root'
})
export class PluginTabService {
    pluginTabs = {};

    loadPluginTabs(tabsArr, filename, modulename) {
        tabsArr.forEach((tab, index) => {
            tab.filename = filename;
            tab.module = modulename;
            const outlet = tab.outlet.toString();
            if (!this.pluginTabs[outlet]) {
                this.pluginTabs[outlet] = [];
            }
            this.pluginTabs[outlet].push(tab);
        });
    }

    getOutletTabs(outlet: string) {
        return (this.pluginTabs[outlet] ? this.pluginTabs[outlet] : []);
    }

}
