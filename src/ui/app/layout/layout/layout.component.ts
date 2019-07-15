import {Component, EventEmitter, Output} from '@angular/core';
import {Router, RoutesRecognized} from '@angular/router';

@Component({
    selector: 'layout-outlet',
    templateUrl: './layout.component.html',
    styleUrls: ['./layout.component.css']
})
export class LayoutComponent {
    fullWindow = false;
    spatial = false;
    sidenavOpenState = false;

    constructor(
        private router: Router
    ) {
        this.router.events.subscribe(val => {
            if (val instanceof RoutesRecognized) {
                if (val.state.root.firstChild.data.fullWindow) {
                    this.fullWindow = val.state.root.firstChild.data.fullWindow;
                } else {
                    this.fullWindow = false;
                }

                if (val.state.root.firstChild.data.spatial) {
                    this.spatial = val.state.root.firstChild.data.spatial;
                } else {
                    this.spatial = false;
                }
            }
        });
    }
}
