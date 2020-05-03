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

    getOutletComponents(outlet: string, params: any) {
        if (this.pluginComponents[outlet]) {
            if (params === {}) {
                return this.pluginComponents[outlet];
            } else {
                const newArray = [];
                this.pluginComponents[outlet].forEach((component) => {
                    component.params = Object.assign({}, params);
                    newArray.push(component);
                });
                return newArray;
            }
        } else {
            return [];
        }
    }
}
