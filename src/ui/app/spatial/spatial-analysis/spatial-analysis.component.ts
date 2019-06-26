import {Component, OnInit, ViewEncapsulation} from '@angular/core';

import OlMap from 'ol/Map';
import XYZ from 'ol/source/XYZ';
import {defaults, FullScreen, Zoom} from 'ol/control';
import {ZoomSlider, ScaleLine} from 'ol/control';
import MousePosition from 'ol/control/MousePosition';
import {createStringXY, format} from 'ol/coordinate';
import {Heatmap, Tile} from 'ol/layer';
import {VectorLayer} from 'ol/layer/Vector';
import {Cluster, OSM, Stamen, Vector, TileImage} from 'ol/source';
import TileGrid from 'ol/tilegrid/TileGrid';
import {getTopLeft, getWidth} from 'ol/extent';
import {fromLonLat, transform, get} from 'ol/proj';
import OlView from 'ol/View';
import Projection from 'ol/proj/Projection';
import {PropertyCluster} from '../../../../../src/ui/assets/js/libraries/PropertyCluster.js';
import {
    AtlasManager,
    Circle,
    Fill,
    Stroke,
    RegularShape,
    Style
} from 'ol/style';
import {Overlay} from 'ol/Overlay';

import {MapService} from '../map.service';

@Component({
    selector: 'symbiota-spatial-spatial-analysis',
    templateUrl: './spatial-analysis.component.html',
    encapsulation: ViewEncapsulation.None,
    styleUrls: [
        '../../../../../node_modules/ol/ol.css',
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
