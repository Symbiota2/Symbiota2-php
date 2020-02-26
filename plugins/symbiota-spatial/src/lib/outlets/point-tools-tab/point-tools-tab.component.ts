import {Component} from '@angular/core';
import {Observable} from 'rxjs';

import {MapService} from '../../services/map.service';

@Component({
    selector: 'app-point-tools-tab',
    templateUrl: './point-tools-tab.component.html',
    styleUrls: ['./point-tools-tab.component.css']
})
export class PointToolsTabComponent {
    pointsActive$: Observable<boolean>;
    pointsInactive$: Observable<boolean>;
    concavePolySource = 'all';
    convexPolySource = 'all';
    concaveMaxEdgeLength: number;

    constructor(
        public mapService: MapService
    ) {
        this.pointsActive$ = this.mapService.pointsActiveValue;
        this.pointsInactive$ = this.mapService.pointsInactiveValue;
        this.mapService.concaveMaxEdgeLengthValue.subscribe(value => {
            this.concaveMaxEdgeLength = value;
        });
    }

    concavePolySourceChange(event) {
        this.concavePolySource = event.value;
    }

    convexPolySourceChange(event) {
        this.convexPolySource = event.value;
    }

    onCreateConcavePoly() {
        this.mapService.createConcavePoly(this.concavePolySource, this.concaveMaxEdgeLength);
    }

    onCreateConvexPoly() {
        this.mapService.createConvexPoly(this.convexPolySource);
    }
}
