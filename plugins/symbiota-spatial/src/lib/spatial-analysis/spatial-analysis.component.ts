import {Component, OnInit, ViewEncapsulation} from '@angular/core';

import OlMap from 'ol/Map';
import XYZ from 'ol/source/XYZ';
import {defaults, FullScreen, Zoom} from 'ol/control';
import {ZoomSlider} from 'ol/control';
import MousePosition from 'ol/control/MousePosition';
import {createStringXY, format} from 'ol/coordinate';
import {Heatmap, Tile} from 'ol/layer';
import {VectorLayer} from 'ol/layer/Vector';
import {Cluster, OSM, Vector} from 'ol/source';
import {fromLonLat, transform} from 'ol/proj';
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

import {ConfigurationService} from 'symbiota-shared';

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
    source: XYZ;
    layer: Tile;
    view: OlView;
    layers = {};
    mapCenter: [];
    mapZoom: number;

    mapProjection = new Projection({
        code: 'EPSG:3857'
    });

    wgs84Projection = new Projection({
        code: 'EPSG:4326',
        units: 'degrees'
    });

    atlasManager = new AtlasManager();

    mousePositionControl = new MousePosition({
        coordinateFormat: createStringXY(),
        projection: 'EPSG:4326',
        // comment the following two lines to have the mouse position
        // be placed within the map.
        className: 'mapcoords',
        target: document.getElementById('mapcoords'),
        undefinedHTML: '&nbsp;'
    });

    constructor(
        configService: ConfigurationService
    ) {
        this.mapCenter = (
            configService.data.MAP_INITIAL_CENTER ? JSON.parse(configService.data.MAP_INITIAL_CENTER) : [-110.90713, 32.21976]
        );
        this.mapZoom = (configService.data.MAP_INITIAL_ZOOM ? configService.data.MAP_INITIAL_ZOOM : 7);
    }

    ngOnInit() {
        this.layers['base'] = new Tile({
            source: new XYZ({
                url: 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}',
                crossOrigin: 'anonymous'
            })
        });

        this.source = new XYZ({
            // Tiles from Mapbox (Light)
            url: 'https://api.tiles.mapbox.com/v4/mapbox.light/{z}/{x}/{y}.png?' +
                'access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
        });

        this.layer = new Tile({
            source: this.source
        });

        this.view = new OlView({
            zoom: this.mapZoom,
            projection: 'EPSG:3857',
            minZoom: 2.5,
            maxZoom: 19,
            center: transform(this.mapCenter, 'EPSG:4326', 'EPSG:3857'),
        });

        this.map = new OlMap({
            controls: defaults().extend([
                new FullScreen()
            ]),
            target: 'map',
            layers: [this.layer],
            view: this.view
        });

        const zoomslider = new ZoomSlider();
        // this.map.addControl(zoomslider);
        // this.map.addControl(this.mousePositionControl);
    }

    formatMouseCoordinates() {
        return(function(coord1) {
            const mouseCoords = coord1;
            if (coord1[0] < -180) {
                coord1[0] = coord1[0] + 360;
            }
            if (coord1[0] > 180) {
                coord1[0] = coord1[0] - 360;
            }
            const template = 'Lat: {y} Lon: {x}';
            const coord2 = [coord1[1], coord1[0]];
            return format(coord1, template, 5);
        });
    }

}
