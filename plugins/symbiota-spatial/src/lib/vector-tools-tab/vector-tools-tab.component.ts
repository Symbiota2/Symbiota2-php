import {Component} from '@angular/core';

import {MapService} from '../map.service';

@Component({
    selector: 'app-vector-tools-tab',
    templateUrl: './vector-tools-tab.component.html',
    styleUrls: ['./vector-tools-tab.component.css']
})
export class VectorToolsTabComponent {
    selectedArea: number;
    downloadType = '';
    bufferSize: number;

    constructor(
        public mapService: MapService
    ) {
        this.mapService.bufferDistanceValue.subscribe(value => {
            this.bufferSize = value;
        });
        this.mapService.selectedShapeAreaValue.subscribe(value => {
            this.selectedArea = value;
        });
    }

    downloadTypeChange(event) {
        this.downloadType = event.value;
    }

    bufferSizeChange(event) {
        this.bufferSize = event.value;
    }

    onDownloadShapesLayer() {
        this.mapService.downloadShapesLayer(this.downloadType);
    }

    onCreateBuffers() {
        this.mapService.createBuffers(this.bufferSize);
    }

    onCreatePolyDifference() {
        this.mapService.createPolyDifference();
    }

    onCreatePolyIntersect() {
        this.mapService.createPolyIntersect();
    }

    onCreatePolyUnion() {
        this.mapService.createPolyUnion();
    }
}
