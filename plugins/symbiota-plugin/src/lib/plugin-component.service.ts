import {Injectable} from '@angular/core';

@Injectable({
    providedIn: 'root'
})
export class PluginComponentService {
    pluginComponents = {};

    loadPluginComponents(componentArr, filename) {
        componentArr.forEach((component, index) => {
            component.filename = filename;
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
