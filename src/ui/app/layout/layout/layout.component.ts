import {Component} from '@angular/core';
import { Router, ActivatedRoute, RoutesRecognized } from '@angular/router';

@Component({
    selector: 'layout-outlet',
    templateUrl: './layout.component.html',
    styleUrls: ['./layout.component.css']
})
export class LayoutComponent {

    fullWindow = false;

    constructor(
        private route: ActivatedRoute,
        private router: Router
    ) {
        const eventsSubscription = this.router.events.subscribe(val => {
            if (val instanceof RoutesRecognized) {
                if (val.state.root.firstChild.data.fullWindow) {
                    this.fullWindow = val.state.root.firstChild.data.fullWindow;
                } else {
                    this.fullWindow = false;
                }
            }
        });
    }
}
