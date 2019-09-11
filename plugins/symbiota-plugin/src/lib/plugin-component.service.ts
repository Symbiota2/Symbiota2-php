import {Injectable} from '@angular/core';

@Injectable({
    providedIn: 'root'
})
export class PluginComponentService {
    pluginComponents = {};

    loadPluginComponents(componentArr, filename, modulename) {
        componentArr.forEach((component, index) => {
            component.filename = filename;
            component.module = modulename;
            const outlet = component.outlet.toString();
            if (!this.pluginComponents[outlet]) {
                this.pluginComponents[outlet] = [];
            }
            this.pluginComponents[outlet].push(component);
        });
    }

    getOutletComponents(outlet: string) {
        return (this.pluginComponents[outlet] ? this.pluginComponents[outlet] : []);
    }
}
