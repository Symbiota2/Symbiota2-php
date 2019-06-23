import {Component, OnInit} from '@angular/core';

import OlMap from 'ol/Map';
import XYZ from 'ol/source/XYZ';
import {defaults as defaultControls, FullScreen, Zoom} from 'ol/control';
import {ZoomSlider} from 'ol/control';
import {Heatmap as HeatmapLayer, Tile as TileLayer} from 'ol/layer';
import VectorLayer from 'ol/layer/Vector';
import {Cluster, OSM, Vector as VectorSource} from 'ol/source';
import {fromLonLat} from 'ol/proj';
import OlView from 'ol/View';
import PropertyCluster from '../../../../../src/ui/assets/js/libraries/PropertyCluster.js';
import {
    AtlasManager,
    Circle as CircleStyle,
    Fill as FillStyle,
    Stroke as StrokeStyle,
    RegularShape,
    Style
} from 'ol/style';
import Overlay from 'ol/Overlay';

@Component({
    selector: 'symbiota-spatial-symbiota-spatial',
    template: `
        <div id="map" class="map"></div>
    `,
    styleUrls: [
        '../../../../../node_modules/ol/ol.css',
        './symbiota-spatial.component.css'
    ]
})
export class SymbiotaSpatialComponent implements OnInit {

    map: OlMap;
    source: XYZ;
    layer: TileLayer;
    view: OlView;

    constructor() {
    }

    ngOnInit() {
        this.source = new XYZ({
            // Tiles from Mapbox (Light)
            url: 'https://api.tiles.mapbox.com/v4/mapbox.light/{z}/{x}/{y}.png?' +
                'access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
        });

        this.layer = new TileLayer({
            source: this.source
        });

        this.view = new OlView({
            center: fromLonLat([-110.90713, 32.21976]),
            zoom: 8,
        });

        this.map = new OlMap({
            // controls: [],
            target: 'map',
            layers: [this.layer],
            view: this.view
        });

        const zoomslider = new ZoomSlider();
        this.map.addControl(zoomslider);
    }

}
