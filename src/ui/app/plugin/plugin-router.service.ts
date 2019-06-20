import {Router, Route} from '@angular/router';
import {Injectable} from '@angular/core';

@Injectable()
export class PluginRouterService {

    constructor(
        private router: Router,
    ) {}

    private get routes(): Route[] {
        const routesToReturn = this.router.config;
        return routesToReturn.filter(x => x.path !== '');
    }

    activatePluginRoutes(routes: Route[]) {
        routes.forEach((route, index) => {
            if (!this.routeIsRegistered(route.path)) {
                this.registerRoute(route);
            }
        });
    }

    routeIsRegistered(path: string) {
        return this.router.config.filter(r => r.path === path).length > 0;
    }

    registerRoute(route: Route) {
        if (this.routeIsRegistered(route.path)) {
            return;
        }

        this.router.config.unshift(route);
        this.updateRouteConfig(this.router.config);
    }

    private updateRouteConfig(config) {
        this.router.resetConfig(config);
    }
}
