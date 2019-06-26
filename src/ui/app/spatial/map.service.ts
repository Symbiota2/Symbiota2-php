import {Injectable} from '@angular/core';

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
import {PropertyCluster} from '../../assets/js/libraries/PropertyCluster.js';
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

@Injectable({
    providedIn: 'root'
})
export class MapService {
    view: OlView;
    layers = {};
    mapCenter: [];
    mapZoom: number;

    atlasManager = new AtlasManager();

    mousePositionControl = new MousePosition({
        coordinateFormat: (coord1) => {
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
        },
        className: 'mousecoordinates',
        projection: 'EPSG:4326',
        undefinedHTML: '&nbsp;'
    });

    zoomSliderControl = new ZoomSlider();

    fullScreenControl = new FullScreen();

    scaleLineControl_us = new ScaleLine({
        className: 'mapscale_us',
        units: 'us'
    });

    scaleLineControl_metric = new ScaleLine({
        className: 'mapscale_metric',
        units: 'metric'
    });

    mapProjection = new Projection({
        code: 'EPSG:3857'
    });

    wgs84Projection = new Projection({
        code: 'EPSG:4326',
        units: 'degrees'
    });

    baseLayer = new Tile({
        source: new XYZ({
            url: 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}',
            crossOrigin: 'anonymous'
        })
    });

    projection = get('EPSG:4326');
    projectionExtent = this.projection.getExtent();
    tileSize = 512;
    maxResolution = getWidth(this.projectionExtent) / (this.tileSize * 2);
    resolutions = new Array(19);

    constructor(
        configService: ConfigurationService
    ) {
        this.mapCenter = (
            configService.data.MAP_INITIAL_CENTER ? JSON.parse(configService.data.MAP_INITIAL_CENTER) : [-110.90713, 32.21976]
        );
        this.mapZoom = (configService.data.MAP_INITIAL_ZOOM ? configService.data.MAP_INITIAL_ZOOM : 7);
        for (let z = 0; z < 20; ++z) {
            this.resolutions[z] = this.maxResolution / Math.pow(2, z);
        }

        this.layers['base'] = this.baseLayer;

        this.view = new OlView({
            zoom: this.mapZoom,
            projection: 'EPSG:3857',
            minZoom: 2.5,
            maxZoom: 19,
            center: transform(this.mapCenter, 'EPSG:4326', 'EPSG:3857'),
        });
    }

    getMap() {
        return new OlMap({
            target: 'map',
            layers: [
                this.layers['base']
            ],
            view: this.view
        });
    }

    changeBaseMap(map, selection) {
        let blsource = {};
        const baseLayer = map.getLayers().getArray()[0];
        if (selection === 'worldtopo') {
            blsource = new XYZ({
                url: 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}',
                crossOrigin: 'anonymous'
            });
        }
        if (selection === 'openstreet') {
            blsource = new OSM();
        }
        if (selection === 'blackwhite') {
            blsource = new Stamen({layer: 'toner'});
        }
        if (selection === 'worldimagery') {
            blsource = new XYZ({
                url: 'http://services.arcgisonline.com/arcgis/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',
                crossOrigin: 'anonymous'
            });
        }
        if (selection === 'ocean') {
            blsource = new XYZ({
                url: 'http://services.arcgisonline.com/arcgis/rest/services/Ocean_Basemap/MapServer/tile/{z}/{y}/{x}',
                crossOrigin: 'anonymous'
            });
        }
        if (selection === 'ngstopo') {
            blsource = this.setBaseLayerSource('http://services.arcgisonline.com/arcgis/rest/services/NGS_Topo_US_2D/' +
                'MapServer/tile/{z}/{y}/{x}');
        }
        if (selection === 'natgeoworld') {
            blsource = new XYZ({
                url: 'http://services.arcgisonline.com/arcgis/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}',
                crossOrigin: 'anonymous'
            });
        }
        if (selection === 'esristreet') {
            blsource = this.setBaseLayerSource('http://services.arcgisonline.com/arcgis/rest/services/' +
                'ESRI_StreetMap_World_2D/MapServer/tile/{z}/{y}/{x}');
        }
        baseLayer.setSource(blsource);
    }

    setBaseLayerSource(urlTemplate) {
        return new TileImage({
            tileUrlFunction: function(tileCoord, pixelRatio, projection) {
                const z = tileCoord[0];
                let x = tileCoord[1];
                const y = -tileCoord[2] - 1;
                const n = Math.pow(2, z + 1);
                x = x % n;
                if (x * n < 0) {
                    x = x + n;
                }
                return urlTemplate.replace('{z}', z.toString())
                    .replace('{y}', y.toString())
                    .replace('{x}', x.toString());
            },
            projection: 'EPSG:4326',
            tileGrid: new TileGrid({
                origin: getTopLeft(this.projectionExtent),
                resolutions: this.resolutions,
                tileSize: 512
            }),
            crossOrigin: 'anonymous'
        });
    }
}
