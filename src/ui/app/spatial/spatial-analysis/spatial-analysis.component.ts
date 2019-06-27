import {Component, OnInit, ViewEncapsulation} from '@angular/core';

import OlMap from 'ol/Map';

import {MapService} from '../map.service';

@Component({
    selector: 'symbiota-spatial-spatial-analysis',
    templateUrl: './spatial-analysis.component.html',
    encapsulation: ViewEncapsulation.None,
    styleUrls: [
        '../../../../../node_modules/ol/ol.css',
        '../../../assets/css/symbiota-ol.css',
        './spatial-analysis.component.css'
    ]
})
export class SpatialAnalysisComponent implements OnInit {

    map: OlMap;

    constructor(
        public mapService: MapService
    ) {}

    ngOnInit() {
        this.map = this.mapService.getMap();
        this.map.addControl(this.mapService.zoomSliderControl);
        this.map.addControl(this.mapService.fullScreenControl);
        this.map.addControl(this.mapService.mousePositionControl);
        this.map.addControl(this.mapService.scaleLineControl_us);
        this.map.addControl(this.mapService.scaleLineControl_metric);
    }

    baseMapSelectChange(event) {
        this.mapService.changeBaseMap(this.map, event.value);
    }

}
