import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';

interface PluginsConfig {
    plugins: {
        modules: any,
        routes: Array<{
            name: string,
            path: string,
            component: {
                module: string,
                componentType: string
            }
        }>
    };
}

@Injectable({
    providedIn: 'root'
})
export class PluginConfigService {
    config: PluginsConfig;
    baseUrl: string;

    constructor(private http: HttpClient) {
        this.baseUrl = document.location.origin;
    }

    loadConfig() {
        return this.http.get<PluginsConfig>(
            `${this.baseUrl}/assets/plugins-config.json`
        );
    }
}
