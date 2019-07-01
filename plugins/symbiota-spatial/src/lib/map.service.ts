import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {BehaviorSubject, Observable} from 'rxjs';

import OlMap from 'ol/Map';
import XYZ from 'ol/source/XYZ';
import {FullScreen, ZoomSlider, ScaleLine, MousePosition} from 'ol/control';
import {GPX, GeoJSON, IGC, KML, TopoJSON} from 'ol/format';
import {DragAndDrop, Select, Draw} from 'ol/interaction';
import {format} from 'ol/coordinate';
import Feature from 'ol/Feature';
import Point from 'ol/geom/Point';
import {createEmpty, extend, getTopLeft, getWidth} from 'ol/extent';
import {Heatmap, Tile as TileLayer, Vector as VectorLayer} from 'ol/layer';
import {Cluster, OSM, Stamen, Vector as VectorSource, TileImage} from 'ol/source';
import TileGrid from 'ol/tilegrid/TileGrid';
import {Projection, fromLonLat, transform, get} from 'ol/proj';
import Collection from 'ol/Collection';
import {click as clickCondition} from 'ol/events/condition';
import OlView from 'ol/View';
import {PropertyCluster} from './PropertyCluster.js';
import {
    AtlasManager,
    Circle,
    Fill,
    Stroke,
    Text,
    RegularShape,
    Style
} from 'ol/style';
import Overlay from 'ol/Overlay';
import shp from 'shpjs';

import {ConfigurationService} from 'symbiota-shared';
import {AlertService} from 'symbiota-shared';
import {SharedToolsService} from 'symbiota-shared';

import {Layer} from './layer.model';

@Injectable({
    providedIn: 'root'
})
export class MapService {

    constructor(
        private configService: ConfigurationService,
        private alertService: AlertService,
        private sharedTools: SharedToolsService,
        private http: HttpClient
    ) {
        this.activeLayerValue.subscribe(value => {
            this.activeLayer = value.toString();
        });

        this.mapCenter = (
            configService.data.MAP_INITIAL_CENTER ? JSON.parse(configService.data.MAP_INITIAL_CENTER) : [-110.90713, 32.21976]
        );
        this.mapZoom = (configService.data.MAP_INITIAL_ZOOM ? configService.data.MAP_INITIAL_ZOOM : 7);
        for (let z = 0; z < 20; ++z) {
            this.resolutions[z] = this.maxResolution / Math.pow(2, z);
        }

        this.layers['base'] = this.baseLayer;
        this.layers['dragdrop1'] = this.dragdroplayer1;
        this.layers['dragdrop2'] = this.dragdroplayer2;
        this.layers['dragdrop3'] = this.dragdroplayer3;
        this.layers['select'] = this.selectlayer;
        this.layers['pointv'] = this.pointvectorlayer;
        this.layers['heat'] = this.heatmaplayer;
        this.layers['spider'] = this.spiderLayer;

        this.view = new OlView({
            zoom: this.mapZoom,
            projection: 'EPSG:3857',
            minZoom: 2.5,
            maxZoom: 19,
            center: transform(this.mapCenter, 'EPSG:4326', 'EPSG:3857'),
        });

        this.selectedPointFeatures.on('add', (event) => {
            // setSpatialParamBox();
            // buildQueryStrings();
        });

        this.selectedPointFeatures.on('remove', (event) => {
            // setSpatialParamBox();
            // buildQueryStrings();
        });

        this.dragAndDropInteraction.on('addfeatures', (event) => {
            let filename = event.file.name.split('.');
            const fileType = filename.pop();
            const geoJSONFormat = new GeoJSON();
            filename = filename.join('');
            if (fileType === 'geojson' || fileType === 'kml' || fileType === 'zip') {
                if (fileType === 'geojson' || fileType === 'kml') {
                    if (this.setDragDropTarget()) {
                        const sourceIndex = this.dragDropTarget + 'Source';
                        let features = event.features;
                        if (fileType === 'kml') {
                            features = geoJSONFormat.readFeatures(geoJSONFormat.writeFeatures(features));
                        }
                        this.layers[sourceIndex] = new VectorSource({
                            features: features
                        });
                        this.layers[this.dragDropTarget].setStyle(MapService.getDragDropStyle);
                        this.layers[this.dragDropTarget].setSource(this.layers[sourceIndex]);
                        this.addLayerToSelectorArr({
                            name: this.dragDropTarget,
                            title: filename,
                            layerType: 'vector',
                            removable: true
                        });
                        this.map.getView().fit(this.layers[sourceIndex].getExtent());
                        // toggleLayerTable();
                    }
                } else if (fileType === 'zip') {
                    if (this.setDragDropTarget()) {
                        this.sharedTools.getArrayBuffer(event.file).then((data) => {
                            shp(data).then((geojson) => {
                                const sourceIndex = this.dragDropTarget + 'Source';
                                const res = this.map.getView().getResolution();
                                const features = geoJSONFormat.readFeatures(geojson, {
                                    featureProjection: 'EPSG:3857'
                                });
                                this.layers[sourceIndex] = new VectorSource({
                                    features: features
                                });
                                this.layers[this.dragDropTarget].setStyle(MapService.getDragDropStyle);
                                this.layers[this.dragDropTarget].setSource(this.layers[sourceIndex]);
                                this.addLayerToSelectorArr({
                                    name: this.dragDropTarget,
                                    title: filename,
                                    layerType: 'vector',
                                    removable: true
                                });
                                this.map.getView().fit(this.layers[sourceIndex].getExtent());
                                // toggleLayerTable();
                            });
                        });
                    }
                }
            } else if (fileType === 'shp' || fileType === 'dbf') {
                this.alertService.showErrorSnackbar(
                    'The drag and drop file loading only supports shapefiles when they are loaded in the full shapefile zip archive.',
                    '',
                    5000
                );
            } else {
                this.alertService.showErrorSnackbar(
                    'The drag and drop file loading only supports GeoJSON, kml, and shp file formats.',
                    '',
                    5000
                );
            }
        });

        this.pointInteraction.on('select', (event) => {
            const newfeatures = event.selected;
            const zoomLevel = this.map.getView().getZoom();
            if (newfeatures.length > 0) {
                if (zoomLevel < 17) {
                    const extent = createEmpty();
                    if (newfeatures.length > 1) {
                        for (const n in newfeatures) {
                            if (newfeatures[n]) {
                                const nfeature = newfeatures[n];
                                this.pointInteraction.getFeatures().remove(nfeature);
                                if (nfeature.get('features')) {
                                    const cFeatures = nfeature.get('features');
                                    for (const f in cFeatures) {
                                        if (cFeatures[f]) {
                                            extend(extent, cFeatures[f].getGeometry().getExtent());
                                        }
                                    }
                                } else {
                                    extend(extent, nfeature.getGeometry().getExtent());
                                }
                            }
                        }
                        this.map.getView().fit(extent, this.map.getSize());
                    } else {
                        const newfeature = newfeatures[0];
                        this.pointInteraction.getFeatures().remove(newfeature);
                        if (newfeature.get('features')) {
                            const clusterCnt = newfeature.get('features').length;
                            if (clusterCnt > 1) {
                                const cFeatures = newfeature.get('features');
                                for (const f in cFeatures) {
                                    if (cFeatures[f]) {
                                        extend(extent, cFeatures[f].getGeometry().getExtent());
                                    }
                                }
                                this.map.getView().fit(extent, this.map.getSize());
                            } else {
                                this.processPointSelection(newfeature);
                            }
                        } else {
                            this.processPointSelection(newfeature);
                        }
                    }
                } else {
                    if (newfeatures.length > 1 && !this.spiderFeature) {
                        this.pointInteraction.getFeatures().clear();
                        if (!this.spiderCluster) {
                            this.spiderifyPoints(newfeatures);
                        }
                    } else {
                        let newfeature = newfeatures[0];
                        if (this.spiderFeature) {
                            newfeature = Object.assign({}, this.spiderFeature);
                            this.spiderFeature = Object.assign({}, {});
                        }
                        this.pointInteraction.getFeatures().clear();
                        if (newfeature.get('features')) {
                            const clusterCnt = newfeatures[0].get('features').length;
                            if (clusterCnt > 1 && !this.spiderCluster) {
                                this.spiderifyPoints(newfeatures);
                            } else {
                                this.processPointSelection(newfeature);
                            }
                        } else {
                            this.processPointSelection(newfeature);
                        }
                    }
                }
            }
        });

        this.selectedFeatures.on('add', (event) => {
            // setSpatialParamBox();
            // buildQueryStrings();
        });

        this.selectedFeatures.on('remove', (event) => {
            // setSpatialParamBox();
            // buildQueryStrings();
        });

        this.selectsource.on('change', (event) => {
            if (!this.draw) {
                const featureCnt = this.selectsource.getFeatures().length;
                if (featureCnt > 0) {
                    if (!this.shapeActive) {
                        this.addLayerToSelectorArr({
                            name: 'select',
                            title: 'Shapes',
                            layerType: 'vector',
                            removable: true
                        });
                        this.shapeActive = true;
                    }
                } else {
                    if (this.shapeActive) {
                        this.removeLayerFromSelectorArr('select');
                        this.shapeActive = false;
                    }
                }
            }
        });
    }

    map: OlMap;
    view: OlView;
    layers = {};
    draw: any;
    popupOverlay: any;
    popupContainer: any;
    popupCloser: any;
    popupContent: any;
    finderPopupOverlay: any;
    finderPopupContainer: any;
    finderPopupCloser: any;
    finderPopupContent: any;
    mapCenter: [];
    mapZoom: number;
    activeLayer: string;
    heatMapRadius = '5';
    heatMapBlur = '15';
    clusterPoints = true;
    shapeActive = false;
    selections = [];
    mapSymbology = 'coll';
    collSymbology = [];
    taxaSymbology = [];
    clusterKey = 'CollectionName';
    spiderCluster = false;
    spiderFeature = {};
    hiddenClusters = [];
    clickedFeatures = [];
    overlayLayers = [];
    dragDropTarget = '';
    dragDrop1 = false;
    dragDrop2 = false;
    dragDrop3 = false;
    drawToolSelectedSubject = new BehaviorSubject<string>('None');
    public readonly drawToolSelectedValue: Observable<string> = this.drawToolSelectedSubject.asObservable();
    layersSelectorSubject = new BehaviorSubject<Layer[]>([
        {
            name: 'none',
            title: 'None',
            removable: false
        }
    ]);
    public readonly layersSelectorArr: Observable<Layer[]> = this.layersSelectorSubject.asObservable();
    activeLayerSubject = new BehaviorSubject<string>('none');
    public readonly activeLayerValue: Observable<string> = this.activeLayerSubject.asObservable();

    atlasManager = new AtlasManager();

    mousePositionControl = new MousePosition({
        coordinateFormat: (coord) => {
            if (coord[0] < 0) {
                const longitude = ((coord[0] % 360) + 180);
                if (longitude < 0) {
                    coord[0] = (coord[0] % 360) + 360;
                }
                if (longitude > 0) {
                    coord[0] = coord[0] % 360;
                }
            } else {
                const longitude = ((coord[0] % 360) - 180);
                if (longitude > 0) {
                    coord[0] = (coord[0] % 360) - 360;
                }
                if (longitude < 0) {
                    coord[0] = coord[0] % 360;
                }
            }
            const template = 'Lat: {y} Lon: {x}';
            return format(coord, template, 5);
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

    dragAndDropInteraction = new DragAndDrop({
        formatConstructors: [
            GPX,
            GeoJSON,
            IGC,
            KML,
            TopoJSON
        ]
    });

    mapProjection = new Projection({
        code: 'EPSG:3857'
    });

    wgs84Projection = new Projection({
        code: 'EPSG:4326',
        units: 'degrees'
    });

    baseLayer = new TileLayer({
        source: new XYZ({
            url: 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}',
            crossOrigin: 'anonymous'
        })
    });

    selectsource = new VectorSource({wrapX: false});
    selectlayer = new VectorLayer({
        source: this.selectsource,
        style: new Style({
            fill: new Fill({
                color: 'rgba(255,255,255,0.4)'
            }),
            stroke: new Stroke({
                color: '#3399CC',
                width: 2
            }),
            image: new Circle({
                radius: 7,
                stroke: new Stroke({
                    color: '#3399CC',
                    width: 2
                }),
                fill: new Fill({
                    color: 'rgba(255,255,255,0.4)'
                })
            })
        })
    });

    pointvectorsource = new VectorSource({wrapX: false});
    pointvectorlayer = new VectorLayer({
        source: this.pointvectorsource
    });

    heatmaplayer = new Heatmap({
        source: this.pointvectorsource,
        weight: (feature) => {
            const showPoint = true;
            /* if (dateSliderActive) {
                showPoint = validateFeatureDate(feature);
            } */
            if (showPoint) {
                return 1;
            } else {
                return 0;
            }
        },
        gradient: ['#00f', '#0ff', '#0f0', '#ff0', '#f00'],
        blur: parseInt(this.heatMapBlur, 10),
        radius: parseInt(this.heatMapRadius, 10),
        visible: false
    });

    blankdragdropsource = new VectorSource({wrapX: false});
    dragdroplayer1 = new VectorLayer({
        source: this.blankdragdropsource
    });
    dragdroplayer2 = new VectorLayer({
        source: this.blankdragdropsource
    });
    dragdroplayer3 = new VectorLayer({
        source: this.blankdragdropsource
    });

    spiderLayer = new VectorLayer({
        source: new VectorSource({
            features: new Collection(),
            useSpatialIndex: true
        })
    });

    selectInteraction = new Select({
        layers: [
            this.layers['select']
        ],
        condition: (evt) => {
            return (evt.type === 'click' && this.activeLayer === 'select' && !evt.originalEvent.altKey);
        },
        style: new Style({
            fill: new Fill({
                color: 'rgba(255, 255, 255, 0.5)'
            }),
            stroke: new Stroke({
                color: 'rgba(0, 153, 255, 1)',
                width: 5
            }),
            image: new Circle({
                radius: 7,
                stroke: new Stroke({
                    color: 'rgba(0, 153, 255, 1)',
                    width: 2
                }),
                fill: new Fill({
                    color: 'rgba(0, 153, 255, 1)'
                })
            })
        }),
        toggleCondition: clickCondition
    });

    pointInteraction = new Select({
        layers: [
            this.layers['pointv'],
            this.layers['spider']
        ],
        condition: (evt) => {
            if (evt.type === 'click' && this.activeLayer === 'pointv') {
                if (!evt.originalEvent.altKey) {
                    if (this.spiderCluster) {
                        const spiderclick = this.map.forEachFeatureAtPixel(evt.pixel, (feature, layer) => {
                            this.spiderFeature = feature;
                            if (feature && layer === this.layers['spider']) {
                                return feature;
                            }
                        });
                        if (!spiderclick) {
                            const blankSource = new VectorSource({
                                features: new Collection(),
                                useSpatialIndex: true
                            });
                            this.layers['spider'].setSource(blankSource);
                            for (const i in this.hiddenClusters) {
                                if (this.hiddenClusters[i]) {
                                    this.showFeature(this.hiddenClusters[i]);
                                }
                            }
                            this.hiddenClusters = [];
                            this.spiderCluster = false;
                            this.spiderFeature = {};
                            this.layers['pointv'].getSource().changed();
                        }
                    }
                    return true;
                } else if (evt.originalEvent.altKey) {
                    this.map.forEachFeatureAtPixel(evt.pixel, (feature, layer) => {
                        if (feature) {
                            if (this.spiderCluster && layer === this.layers['spider']) {
                                this.clickedFeatures.push(feature);
                                return feature;
                            } else if (layer === this.layers['pointv']) {
                                this.clickedFeatures.push(feature);
                                return feature;
                            }
                        }
                    });
                    return false;
                }
            } else {
                return false;
            }
        },
        toggleCondition: clickCondition,
        multi: true,
        hitTolerance: 2,
        style: this.getPointStyle
    });

    selectedFeatures = this.selectInteraction.getFeatures();
    selectedPointFeatures = this.pointInteraction.getFeatures();

    projection = get('EPSG:4326');
    projectionExtent = this.projection.getExtent();
    tileSize = 512;
    maxResolution = getWidth(this.projectionExtent) / (this.tileSize * 2);
    resolutions = new Array(19);

    static hideFeature(feature) {
        const invisibleStyle = new Style({
            image: new Circle({
                radius: feature.get('radius'),
                fill: new Fill({
                    color: 'rgba(255, 255, 255, 0.01)'
                })
            })
        });
        feature.setStyle(invisibleStyle);
    }

    static getDragDropStyle(feature, resolution) {
        const featureStyleFunction = feature.getStyleFunction();
        const dragDropStyle = {
            'Point': new Style({
                image: new Circle({
                    fill: new Fill({
                        color: 'rgba(170, 170, 170, 0.3)'
                    }),
                    radius: 5,
                    stroke: new Stroke({
                        color: '#000000',
                        width: 1
                    })
                })
            }),
            'LineString': new Style({
                stroke: new Stroke({
                    color: '#000000',
                    width: 3
                })
            }),
            'Polygon': new Style({
                fill: new Fill({
                    color: 'rgba(170, 170, 170, 0.3)'
                }),
                stroke: new Stroke({
                    color: '#000000',
                    width: 1
                })
            }),
            'MultiPoint': new Style({
                image: new Circle({
                    fill: new Fill({
                        color: 'rgba(170, 170, 170, 0.3)'
                    }),
                    radius: 5,
                    stroke: new Stroke({
                        color: '#000000',
                        width: 1
                    })
                })
            }),
            'MultiLineString': new Style({
                stroke: new Stroke({
                    color: '#000000',
                    width: 3
                })
            }),
            'MultiPolygon': new Style({
                fill: new Fill({
                    color: 'rgba(170, 170, 170, 0.3)'
                }),
                stroke: new Stroke({
                    color: '#000000',
                    width: 1
                })
            })
        };
        if (featureStyleFunction) {
            return featureStyleFunction.call(feature, resolution);
        } else {
            return dragDropStyle[feature.getGeometry().getType()];
        }
    }

    initializePopup(container: any, content: any, closer: any) {
        this.popupContainer = container;
        this.popupContent = content;
        this.popupCloser = closer;

        this.popupOverlay = new Overlay({
            element: this.popupContainer,
            autoPan: true,
            autoPanAnimation: {
                duration: 250
            }
        });

        this.popupCloser.onclick = () => {
            this.popupOverlay.setPosition(undefined);
            this.popupCloser.blur();
            return false;
        };

        this.map.addOverlay(this.popupOverlay);
    }

    setPopup(content: string, position: any) {
        this.popupContent.innerHTML = content;
        this.popupOverlay.setPosition(position);
    }

    initializeFinderPopup(container: any, content: any, closer: any) {
        this.finderPopupContainer = container;
        this.finderPopupContent = content;
        this.finderPopupCloser = closer;

        this.finderPopupOverlay = new Overlay({
            element: this.finderPopupContainer,
            autoPan: true,
            autoPanAnimation: {
                duration: 250
            }
        });

        this.finderPopupCloser.onclick = () => {
            this.finderPopupOverlay.setPosition(undefined);
            this.finderPopupCloser.blur();
            return false;
        };

        this.map.addOverlay(this.finderPopupOverlay);
    }

    setFinderPopup(content: string, position: any) {
        this.finderPopupContent.innerHTML = content;
        this.finderPopupOverlay.setPosition(position);
    }

    setActiveLayer(value: string) {
        this.activeLayerSubject.next(value);
    }

    addLayerToSelectorArr(layer: Layer) {
        const currentArr = this.layersSelectorSubject.value;
        const updatedArr = [...currentArr, layer];
        this.layersSelectorSubject.next(updatedArr);
    }

    removeLayerFromSelectorArr(name: string) {
        const currentArr = this.layersSelectorSubject.value;
        currentArr.forEach((layer, index) => {
            if (layer.name === name) { currentArr.splice(index, 1); }
        });
        this.layersSelectorSubject.next(currentArr);
    }

    getMap() {
        this.map = new OlMap({
            target: 'map',
            layers: [
                this.layers['base'],
                this.layers['dragdrop1'],
                this.layers['dragdrop2'],
                this.layers['dragdrop3'],
                this.layers['select'],
                this.layers['pointv'],
                this.layers['heat'],
                this.layers['spider']
            ],
            view: this.view
        });

        this.map.getView().on('change:resolution', (event) => {
            if (this.spiderCluster) {
                const source = this.layers['spider'].getSource();
                source.clear();
                const blankSource = new VectorSource({
                    features: new Collection(),
                    useSpatialIndex: true
                });
                this.layers['spider'].setSource(blankSource);
                for (const i in this.hiddenClusters) {
                    if (this.hiddenClusters[i]) {
                        this.showFeature(this.hiddenClusters[i]);
                    }
                }
                this.hiddenClusters = [];
                this.spiderCluster = false;
                this.layers['pointv'].getSource().changed();
            }
        });

        this.map.on('singleclick', (evt) => {
            if (evt.originalEvent.altKey) {
                const layerIndex = this.activeLayer + 'Source';
                const viewResolution = this.view.getResolution();
                if (this.activeLayer !== 'none'
                    && this.activeLayer !== 'select'
                    && this.activeLayer !== 'pointv'
                    && this.activeLayer !== 'dragdrop1'
                    && this.activeLayer !== 'dragdrop2'
                    && this.activeLayer !== 'dragdrop3') {
                    const url = this.layers[layerIndex].getGetFeatureInfoUrl(
                        evt.coordinate,
                        viewResolution,
                        'EPSG:3857',
                        {'INFO_FORMAT': 'application/json'}
                    );
                    if (url) {
                        this.http.get(url).subscribe(
                            (res) => {
                                if (res) {
                                    let infoHTML = '';
                                    const propArr = res['features'][0]['properties'];
                                    if (this.overlayLayers[this.activeLayer]) {
                                        const sourceVal = propArr['GRAY_INDEX'];
                                        const lowCalVal = this.overlayLayers[this.activeLayer]['values']['rasmin'];
                                        const highCalVal = this.overlayLayers[this.activeLayer]['values']['rasmax'];
                                        const calcVal = this.overlayLayers[this.activeLayer]['values']['newval'];
                                        if (sourceVal >= lowCalVal && sourceVal <= highCalVal) {
                                            infoHTML += '<b>Value:</b> ' + calcVal + '<br />';
                                        } else {
                                            infoHTML += '<b>Value:</b> 0<br />';
                                        }
                                    } else {
                                        for (const key in propArr) {
                                            if (propArr[key]) {
                                                let valTag = '';
                                                if (key === 'GRAY_INDEX') {
                                                    valTag = 'Value';
                                                } else {
                                                    valTag = key;
                                                }
                                                infoHTML += '<b>' + valTag + ':</b> ' + propArr[key] + '<br />';
                                            }
                                        }
                                    }
                                    if (this.popupOverlay) {
                                        this.setPopup(infoHTML, evt.coordinate);
                                    }
                                }
                            }
                        );
                    }
                } else if (this.activeLayer === 'dragdrop1'
                    || this.activeLayer === 'dragdrop2'
                    || this.activeLayer === 'dragdrop3'
                    || this.activeLayer === 'select') {
                    let infoHTML = '';
                    const selectedFeature = this.map.forEachFeatureAtPixel(evt.pixel, (feature, layer) => {
                        if (layer === this.layers[this.activeLayer]) {
                            return feature;
                        }
                    });
                    if (selectedFeature) {
                        const properties = selectedFeature.getKeys();
                        for (const i in properties) {
                            if (properties[i].toString() !== 'geometry') {
                                infoHTML += '<b>' + properties[i] + ':</b> ' + selectedFeature.get(properties[i]) + '<br />';
                            }
                        }
                        if (infoHTML) {
                            if (this.popupOverlay) {
                                this.setPopup(infoHTML, evt.coordinate);
                            }
                        }
                    }
                } else if (this.activeLayer === 'pointv') {
                    let infoHTML = '';
                    let targetFeature: any;
                    let iFeature: any;
                    if (this.clickedFeatures.length === 1) {
                        targetFeature = Object.assign({}, this.clickedFeatures[0]);
                    }
                    if (targetFeature) {
                        if (this.clusterPoints && targetFeature.get('features').length === 1) {
                            iFeature = targetFeature.get('features')[0];
                        } else if (!this.clusterPoints) {
                            iFeature = Object.assign({}, targetFeature);
                        }
                    } else {
                        return;
                    }
                    if (iFeature) {
                        infoHTML += '<b>occid:</b> ' + iFeature.get('occid') + '<br />';
                        infoHTML += '<b>CollectionName:</b> '
                            + (iFeature.get('CollectionName') ? iFeature.get('CollectionName') : '') + '<br />';
                        infoHTML += '<b>catalogNumber:</b> '
                            + (iFeature.get('catalogNumber') ? iFeature.get('catalogNumber') : '') + '<br />';
                        infoHTML += '<b>otherCatalogNumbers:</b> '
                            + (iFeature.get('otherCatalogNumbers') ? iFeature.get('otherCatalogNumbers') : '') + '<br />';
                        infoHTML += '<b>family:</b> ' + (iFeature.get('family') ? iFeature.get('family') : '') + '<br />';
                        infoHTML += '<b>sciname:</b> ' + (iFeature.get('sciname') ? iFeature.get('sciname') : '') + '<br />';
                        infoHTML += '<b>recordedBy:</b> ' + (iFeature.get('recordedBy') ? iFeature.get('recordedBy') : '') + '<br />';
                        infoHTML += '<b>recordNumber:</b> ' + (iFeature.get('recordNumber') ? iFeature.get('recordNumber') : '') + '<br />';
                        infoHTML += '<b>eventDate:</b> ' + (iFeature.get('displayDate') ? iFeature.get('displayDate') : '') + '<br />';
                        infoHTML += '<b>habitat:</b> ' + (iFeature.get('habitat') ? iFeature.get('habitat') : '') + '<br />';
                        infoHTML += '<b>associatedTaxa:</b> '
                            + (iFeature.get('associatedTaxa') ? iFeature.get('associatedTaxa') : '') + '<br />';
                        infoHTML += '<b>country:</b> ' + (iFeature.get('country') ? iFeature.get('country') : '') + '<br />';
                        infoHTML += '<b>StateProvince:</b> '
                            + (iFeature.get('StateProvince') ? iFeature.get('StateProvince') : '') + '<br />';
                        infoHTML += '<b>county:</b> ' + (iFeature.get('county') ? iFeature.get('county') : '') + '<br />';
                        infoHTML += '<b>locality:</b> ' + (iFeature.get('locality') ? iFeature.get('locality') : '') + '<br />';
                        if (iFeature.get('thumbnailurl')) {
                            const thumburl = iFeature.get('thumbnailurl');
                            infoHTML += '<img src="' + thumburl + '" style="height:150px" />';
                        }
                        if (this.popupOverlay) {
                            this.setPopup(infoHTML, evt.coordinate);
                        }
                    } else {
                        this.alertService.showErrorSnackbar(
                            'You clicked on multiple points. The info window can only display data for a single point.',
                            '',
                            5000
                        );
                    }
                    this.clickedFeatures = [];
                }
            } else {
                const layerIndex = this.activeLayer + 'Source';
                if (this.activeLayer !== 'none' && this.activeLayer !== 'select' && this.activeLayer !== 'pointv') {
                    if (this.activeLayer === 'dragdrop1' || this.activeLayer === 'dragdrop2' || this.activeLayer === 'dragdrop3') {
                        this.map.forEachFeatureAtPixel(evt.pixel, (feature, layer) => {
                            if (layer === this.layers[this.activeLayer]) {
                                try {
                                    this.selectsource.addFeature(feature);
                                    this.setActiveLayer('select');
                                } catch (e) {
                                    this.alertService.showErrorSnackbar(
                                        'Feature has already been added to Shapes layer.',
                                        '',
                                        5000
                                    );
                                }
                            }
                        });
                    } else {
                        const viewResolution = this.view.getResolution();
                        const url = this.layers[layerIndex].getGetFeatureInfoUrl(
                            evt.coordinate,
                            viewResolution,
                            'EPSG:3857',
                            {'INFO_FORMAT': 'application/json'}
                        );
                        // selectObjectFromID(url, this.activeLayer);
                    }
                }
            }
        });

        return this.map;
    }

    getPointStyle(feature) {
        let style = '';
        if (this.clusterPoints) {
            style = this.setClusterSymbol(feature);
        } else {
            style = this.setSymbol(feature);
        }
        return style;
    }

    setClusterSymbol(feature) {
        let style = '';
        let stroke = '';
        let selected = false;
        if (feature.get('features')) {
            const size = feature.get('features').length;
            if (size > 1) {
                const features = feature.get('features');
                const clusterindex = feature.get('identifiers');
                if (this.selections.length > 0) {
                    for (const i in this.selections) {
                        if (clusterindex.indexOf(this.selections[i]) !== -1) {
                            selected = true;
                        }
                    }
                }
                const cKey = feature.get('clusterkey');
                let hexcolor = '';
                if (this.mapSymbology === 'coll') {
                    hexcolor = '#' + this.collSymbology[cKey]['color'];
                } else if (this.mapSymbology === 'taxa') {
                    hexcolor = '#' + this.taxaSymbology[cKey]['color'];
                }
                const colorArr = this.sharedTools.hexToRgb(hexcolor);
                let radius = 0;
                if (size < 10) {
                    radius = 10;
                } else if (size < 100) {
                    radius = 15;
                } else if (size < 1000) {
                    radius = 20;
                } else if (size < 10000) {
                    radius = 25;
                } else if (size < 100000) {
                    radius = 30;
                } else {
                    radius = 35;
                }

                if (selected) {
                    stroke = new Stroke({color: '#10D8E6', width: 2});
                }

                style = new Style({
                    image: new Circle({
                        opacity: 1,
                        scale: 1,
                        radius: radius,
                        stroke: stroke,
                        fill: new Fill({
                            color: [colorArr['r'], colorArr['g'], colorArr['b'], 0.8]
                        }),
                        atlasManager: this.atlasManager
                    }),
                    text: new Text({
                        scale: 1,
                        text: size.toString(),
                        fill: new Fill({
                            color: '#fff'
                        }),
                        stroke: new Stroke({
                            color: 'rgba(0, 0, 0, 0.6)',
                            width: 3
                        })
                    })
                });
            } else {
                const originalFeature = feature.get('features')[0];
                style = this.setSymbol(originalFeature);
            }
        }
        return style;
    }

    changeDrawTool(selection) {
        this.map.removeInteraction(this.draw);
        if (selection !== 'None') {
            this.draw = new Draw({
                source: this.selectsource,
                type: (selection)
            });

            this.draw.on('drawend', (evt) => {
                this.drawToolSelectedSubject.next('None');
                this.map.removeInteraction(this.draw);
                if (!this.shapeActive) {
                    this.addLayerToSelectorArr({
                        name: 'select',
                        title: 'Shapes',
                        layerType: 'vector',
                        removable: true
                    });
                    this.shapeActive = true;
                    this.setActiveLayer('select');
                } else {
                    this.setActiveLayer('select');
                }
                this.draw = Object.assign({}, {});
            });

            this.map.addInteraction(this.draw);
        } else {
            this.draw = Object.assign({}, {});
        }
    }

    changeBaseMap(selection) {
        let blsource = {};
        const baseLayer = this.map.getLayers().getArray()[0];
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

    processPointSelection(sFeature) {
        const feature = (sFeature.get('features') ? sFeature.get('features')[0] : sFeature);
        const occid = Number(feature.get('occid'));
        if (this.selections.indexOf(occid) < 0) {
            this.selections.push(occid);
            // var infoArr = getPointInfoArr(sFeature);
            // updateSelections(occid,infoArr);
        } else {
            const index = this.selections.indexOf(occid);
            this.selections.splice(index, 1);
            // removeSelectionRecord(occid);
        }
        const style = (sFeature.get('features') ? this.setClusterSymbol(sFeature) : this.setSymbol(sFeature));
        sFeature.setStyle(style);
        // adjustSelectionsTab();
    }

    showFeature(feature) {
        let featureStyle = {};
        if (feature.get('features')) {
            featureStyle = this.setClusterSymbol(feature);
        } else {
            featureStyle = this.setSymbol(feature);
        }
        feature.setStyle(featureStyle);
    }

    setSymbol(feature) {
        const showPoint = true;
        /* if (dateSliderActive) {
            showPoint = validateFeatureDate(feature);
        } */
        let style = '';
        let stroke = '';
        let fill = '';
        let selected = false;
        const cKey = feature.get(this.clusterKey);
        let recType = feature.get('CollType');
        if (!recType) {
            recType = 'observation';
        }
        if (this.selections.length > 0) {
            const occid = feature.get('occid');
            if (this.selections.indexOf(occid) !== -1) {
                selected = true;
            }
        }
        let color = '';
        if (this.mapSymbology === 'coll') {
            color = '#' + this.collSymbology[cKey]['color'];
        } else if (this.mapSymbology === 'taxa') {
            color = '#' + this.taxaSymbology[cKey]['color'];
        }

        if (showPoint) {
            if (selected) {
                stroke = new Stroke({color: '#10D8E6', width: 2});
            } else {
                stroke = new Stroke({color: 'black', width: 1});
            }
            fill = new Fill({color: color});
        } else {
            stroke = new Stroke({color: 'rgba(255, 255, 255, 0.01)', width: 0});
            fill = new Fill({color: 'rgba(255, 255, 255, 0.01)'});
        }

        if (recType.toLowerCase().indexOf('observation') !== -1) {
            style = new Style({
                image: new RegularShape({
                    opacity: 1,
                    scale: 1,
                    fill: fill,
                    stroke: stroke,
                    points: 3,
                    radius: 7,
                    atlasManager: this.atlasManager
                })
            });
        } else {
            style = new Style({
                image: new Circle({
                    opacity: 1,
                    scale: 1,
                    radius: 7,
                    fill: fill,
                    stroke: stroke,
                    atlasManager: this.atlasManager
                })
            });
        }

        return style;
    }

    setDragDropTarget() {
        this.dragDropTarget = '';
        if (!this.dragDrop1) {
            this.dragDrop1 = true;
            this.dragDropTarget = 'dragdrop1';
            return true;
        } else if (!this.dragDrop2) {
            this.dragDrop2 = true;
            this.dragDropTarget = 'dragdrop2';
            return true;
        } else if (!this.dragDrop3) {
            this.dragDrop3 = true;
            this.dragDropTarget = 'dragdrop3';
            return true;
        } else {
            this.alertService.showErrorSnackbar(
                'You may only have 3 uploaded layers at a time. Please remove one of the currently uploaded layers to upload more.',
                '',
                5000
            );
            return false;
        }
    }

    spiderifyPoints(features) {
        this.spiderCluster = true;
        this.spiderFeature = Object.assign({}, {});
        const spiderFeatures = [];
        for (const f in features) {
            if (features[f]) {
                const feature = features[f];
                MapService.hideFeature(feature);
                this.hiddenClusters.push(feature);
                if (feature.get('features')) {
                    const addFeatures = feature.get('features');
                    for (const fa in addFeatures) {
                        if (addFeatures[fa]) {
                            spiderFeatures.push(addFeatures[fa]);
                        }
                    }
                } else {
                    spiderFeatures.push(feature);
                }
            }
        }

        const source = this.layers['spider'].getSource();
        source.clear();

        const center = features[0].getGeometry().getCoordinates();
        const pix = this.map.getView().getResolution();
        const rad = pix * 12 * (0.5 + spiderFeatures.length / 4);
        if (spiderFeatures.length <= 10) {
            const max = Math.min(spiderFeatures.length, 10);
            for (const i in spiderFeatures) {
                if (spiderFeatures[i]) {
                    let acos = 2 * Math.PI * Number(i) / max;
                    if (max === 2 || max === 4) {
                        acos += Math.PI / 4;
                    }
                    const pos = [center[0] + rad * Math.sin(acos), center[1] + rad * Math.cos(acos)];
                    const cf = new Feature({
                        features: [spiderFeatures[i]],
                        geometry: new Point(pos)
                    });
                    const style = this.setClusterSymbol(cf);
                    cf.setStyle(style);
                    source.addFeature(cf);
                }
            }
        } else {
            let acos = 0;
            const dec = 30;
            const max = Math.min (60, spiderFeatures.length);
            for (const i in spiderFeatures) {
                if (spiderFeatures[i]) {
                    const rad2 = dec / 2 + dec * acos / (2 * Math.PI);
                    acos = acos + (dec + 0.1) / rad2;
                    const dx = pix * rad2 * Math.sin(acos);
                    const dy = pix * rad2 * Math.cos(acos);
                    const pos = [center[0] + dx, center[1] + dy];
                    const cf = new Feature({
                        features: [spiderFeatures[i]],
                        geometry: new Point(pos)
                    });
                    const style = this.setClusterSymbol(cf);
                    cf.setStyle(style);
                    source.addFeature(cf);
                }
            }
        }
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
