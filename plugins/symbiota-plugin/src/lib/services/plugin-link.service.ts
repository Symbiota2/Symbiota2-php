import {Injectable} from '@angular/core';

@Injectable({
    providedIn: 'root'
})
export class PluginLinkService {
    pluginLinks = {};

    loadPluginLinks(linkArr) {
        linkArr.forEach((link, index) => {
            const outlet = link.outlet.toString();
            if (!this.pluginLinks[outlet]) {
                this.pluginLinks[outlet] = [];
            }
            this.pluginLinks[outlet].push(link);
        });
    }

    getOutletLinks(outlet: string) {
        return (this.pluginLinks[outlet] ? this.pluginLinks[outlet] : []);
    }
}
