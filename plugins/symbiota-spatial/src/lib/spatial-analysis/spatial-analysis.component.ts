import {Component, OnInit, ViewEncapsulation} from '@angular/core';

import OlMap from 'ol/Map';

import {MapService} from '../map.service';

@Component({
    selector: 'symbiota-spatial-spatial-analysis',
    templateUrl: './spatial-analysis.component.html',
    encapsulation: ViewEncapsulation.None,
    styleUrls: [
        '../../../../../node_modules/ol/ol.css',
        './symbiota-ol.css',
        './spatial-analysis.component.css'
    ],
    providers: [MapService]
})
export class SpatialAnalysisComponent implements OnInit {

    map: OlMap;
    drawSelectedValue: string;

    constructor(
        public mapService: MapService
    ) {
        this.mapService.drawToolSelectedValue.subscribe(value => {
            this.drawSelectedValue = value.toString();
        });
    }

    ngOnInit() {
        this.map = this.mapService.getMap();
        this.map.addControl(this.mapService.zoomSliderControl);
        this.map.addControl(this.mapService.fullScreenControl);
        this.map.addControl(this.mapService.mousePositionControl);
        this.map.addControl(this.mapService.scaleLineControl_us);
        this.map.addControl(this.mapService.scaleLineControl_metric);
        this.map.addInteraction(this.mapService.selectInteraction);
        this.map.addInteraction(this.mapService.pointInteraction);
        this.map.addInteraction(this.mapService.dragAndDropInteraction);
    }

    baseMapSelectChange(event) {
        this.mapService.changeBaseMap(event.value);
    }

    drawToolSelectChange(event) {
        this.mapService.changeDrawTool(event.value);
    }

}
