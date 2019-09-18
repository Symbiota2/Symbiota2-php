import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {MatDialog} from '@angular/material/dialog';
import {BehaviorSubject, Observable} from 'rxjs';
import {TranslateService} from "@ngx-translate/core";
import OlMap from 'ol/Map';
import XYZ from 'ol/source/XYZ';
import {FullScreen, ZoomSlider, ScaleLine, MousePosition} from 'ol/control';
import {GPX, GeoJSON, IGC, KML, TopoJSON, WKT} from 'ol/format';
import {DragAndDrop, Select, Draw} from 'ol/interaction';
import {format} from 'ol/coordinate';
import Feature from 'ol/Feature';
import {getDistance as haversineDistance} from 'ol/sphere';
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

import {MapSettingsDialogComponent} from './map-settings-dialog/map-settings-dialog.component';
import {MapLayersDialogComponent} from './map-layers-dialog/map-layers-dialog.component';

import {ConfigurationService} from 'symbiota-shared';
import {AlertService} from 'symbiota-shared';
import {SharedToolsService} from 'symbiota-shared';
import {VectorToolsService} from './vector-tools.service';

import {Layer} from './layer.model';
import {map} from 'rxjs/operators';

@Injectable({
    providedIn: 'root'
})
export class MapService {

    constructor(
        private configService: ConfigurationService,
        private alertService: AlertService,
        private vectorService: VectorToolsService,
        private sharedTools: SharedToolsService,
        private http: HttpClient,
        private dialog: MatDialog,
        private translate: TranslateService
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
                            removable: true,
                            visible: true
                        });
                        this.map.getView().fit(this.layers[sourceIndex].getExtent());
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
                                    removable: true,
                                    visible: true
                                });
                                this.map.getView().fit(this.layers[sourceIndex].getExtent());
                            });
                        });
                    }
                }
            } else if (fileType === 'shp' || fileType === 'dbf') {
                const errorMessage = this.translate.get('symbiota-spatial.map-service.drag_drop_error1');
                this.alertService.showErrorSnackbar(
                    errorMessage,
                    '',
                    5000
                );
            } else {
                const errorMessage = this.translate.get('symbiota-spatial.map-service.drag_drop_error2');
                this.alertService.showErrorSnackbar(
                    errorMessage,
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
            this.processShapeSelectionChange();
        });

        this.selectedFeatures.on('remove', (event) => {
            // setSpatialParamBox();
            // buildQueryStrings();
            this.processShapeSelectionChange();
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
                            removable: true,
                            visible: true
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

        this.translate.get('symbiota-spatial.map-service.lat_label').subscribe((res: string) => {
            this.latLabel = res;
        });

        this.translate.get('symbiota-spatial.map-service.long_label').subscribe((res: string) => {
            this.longLabel = res;
        });
    }

    map: OlMap;
    mapId = 'analysis';
    view: OlView;
    layers = {};
    draw: any;
    latLabel: string;
    longLabel: string;
    clustersource: any;
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
    shapeActive = false;
    clusterPoints = true;
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
    vectorizeLayers = [];
    dragDropTarget = '';
    dragDrop1 = false;
    dragDrop2 = false;
    dragDrop3 = false;
    returnClusters = false;
    drawToolSelectedSubject = new BehaviorSubject<string>('None');
    public readonly drawToolSelectedValue: Observable<string> = this.drawToolSelectedSubject.asObservable();
    layersSelectorSubject = new BehaviorSubject<Layer[]>([
        {
            name: 'none',
            title: 'None',
            removable: false,
            visible: true
        }
    ]);
    public readonly layersSelectorArr: Observable<Layer[]> = this.layersSelectorSubject.asObservable();
    activeLayerSubject = new BehaviorSubject<string>('none');
    public readonly activeLayerValue: Observable<string> = this.activeLayerSubject.asObservable();
    clusterDistanceSubject = new BehaviorSubject<number>(50);
    public readonly clusterDistanceValue: Observable<number> = this.clusterDistanceSubject.asObservable();
    heatMapRadiusSubject = new BehaviorSubject<number>(5);
    public readonly heatMapRadiusValue: Observable<number> = this.heatMapRadiusSubject.asObservable();
    heatMapBlurSubject = new BehaviorSubject<number>(15);
    public readonly heatMapBlurValue: Observable<number> = this.heatMapBlurSubject.asObservable();
    clusterPointsSubject = new BehaviorSubject<boolean>(true);
    public readonly clusterPointsValue: Observable<boolean> = this.clusterPointsSubject.asObservable();
    dateSliderActiveSubject = new BehaviorSubject<boolean>(false);
    public readonly dateSliderActiveValue: Observable<boolean> = this.dateSliderActiveSubject.asObservable();
    showHeatMapSubject = new BehaviorSubject<boolean>(false);
    public readonly showHeatMapValue: Observable<boolean> = this.showHeatMapSubject.asObservable();
    pointsActiveSubject = new BehaviorSubject<boolean>(false);
    public readonly pointsActiveValue: Observable<boolean> = this.pointsActiveSubject.asObservable();
    public readonly pointsInactiveValue: Observable<boolean> = this.pointsActiveValue.pipe(
        map(active => !active)
    );
    selectedShapesSubject = new BehaviorSubject<[]>([]);
    public readonly selectedShapesValue: Observable<[]> = this.selectedShapesSubject.asObservable();
    selectedShapeAreaSubject = new BehaviorSubject<number>(0);
    public readonly selectedShapeAreaValue: Observable<number> = this.selectedShapeAreaSubject.asObservable();
    bufferDistanceSubject = new BehaviorSubject<number>(0);
    public readonly bufferDistanceValue: Observable<number> = this.bufferDistanceSubject.asObservable();
    concaveMaxEdgeLengthSubject = new BehaviorSubject<number>(0);
    public readonly concaveMaxEdgeLengthValue: Observable<number> = this.concaveMaxEdgeLengthSubject.asObservable();

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
            const template = this.latLabel + ' {y} ' + this.longLabel + ' {x}';
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
                color: 'rgba(255, 255, 255, 0.4)'
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
                    color: 'rgba(255, 255, 255, 0.4)'
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
            this.selectlayer
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

    static findOccPointInCluster(cluster: any, occid: number) {
        const cFeatures = cluster.get('features');
        for (const f in cFeatures) {
            if (Number(cFeatures[f].get('occid')) === occid) {
                return cFeatures[f];
            }
        }
    }

    toggleLayer(value: boolean, layer: string) {
        const currentArr = this.layersSelectorSubject.value;
        currentArr.forEach((arrLayer, index) => {
            if (arrLayer.name === layer) { arrLayer.visible = value; }
        });
        this.layersSelectorSubject.next(currentArr);
        this.setActiveLayer('none');
        if (value) {
            this.layers[layer].setVisible(true);
        } else {
            this.layers[layer].setVisible(false);
        }
    }

    removeLayer(layerID) {
        if (layerID === 'select') {
            this.selectInteraction.getFeatures().clear();
            this.layers[layerID].getSource().clear(true);
            this.shapeActive = false;
        } else if (layerID === 'pointv') {
            this.clearSelections();
            // adjustSelectionsTab();
            // removeDateSlider();
            this.pointvectorsource = new VectorSource({wrapX: false});
            this.layers['pointv'].setSource(this.pointvectorsource);
            this.layers['heat'].setSource(this.pointvectorsource);
            this.layers['heat'].setVisible(false);
            this.clustersource = '';
        } else if (this.overlayLayers[layerID]) {
            const layerTileSourceName = layerID + 'Source';
            const layerRasterSourceName = layerID + 'RasterSource';
            this.layers[layerTileSourceName] = Object.assign({}, {});
            this.layers[layerRasterSourceName] = Object.assign({}, {});
            this.layers[layerID].setVisible(false);
            const index = this.overlayLayers.indexOf(layerID);
            this.overlayLayers.splice(index, 1);
            if (this.vectorizeLayers[layerID]) {
                const vecindex = this.vectorizeLayers.indexOf(layerID);
                this.vectorizeLayers.splice(vecindex, 1);
            }
        } else {
            this.layers[layerID].setSource(this.blankdragdropsource);
            if (layerID === 'dragdrop1') {
                this.dragDrop1 = false;
            } else if (layerID === 'dragdrop2') {
                this.dragDrop2 = false;
            } else if (layerID === 'dragdrop3') {
                this.dragDrop3 = false;
            }
        }
        this.removeLayerFromSelectorArr(layerID);
        this.setActiveLayer('none');
    }

    processShapeSelectionChange() {
        let totalAreaCalc = 0;
        this.selectInteraction.getFeatures().forEach((feature) => {
            if (feature) {
                const selectedClone = feature.clone();
                const geoType = selectedClone.getGeometry().getType();
                const wktFormat = new WKT();
                const geoJSONFormat = new GeoJSON();
                if (geoType === 'MultiPolygon' || geoType === 'Polygon') {
                    const selectiongeometry = selectedClone.getGeometry();
                    const fixedselectgeometry = selectiongeometry.transform(this.mapProjection, this.wgs84Projection);
                    const geojsonStr = geoJSONFormat.writeGeometry(fixedselectgeometry);
                    let polyCoords = JSON.parse(geojsonStr).coordinates;
                    let turfSimple = {};
                    if (geoType === 'MultiPolygon') {
                        const areaFeat = this.vectorService.getTurfFeature(geoType, polyCoords);
                        const area_km = this.vectorService.getFeatureArea(areaFeat);
                        totalAreaCalc += area_km;
                        for (const e in polyCoords) {
                            if (polyCoords[e]) {
                                let singlePoly = this.vectorService.getTurfFeature('Polygon', polyCoords[e]);
                                // console.log('start multipolygon length: '+singlePoly.geometry.coordinates.length);
                                if (singlePoly.geometry.coordinates.length > 10) {
                                    singlePoly = this.vectorService.getSimplifiedFeature(singlePoly);
                                }
                                // console.log('end multipolygon length: '+singlePoly.geometry.coordinates.length);
                                polyCoords[e] = singlePoly.geometry.coordinates;
                            }
                        }
                        turfSimple = this.vectorService.getTurfFeature(geoType, polyCoords);
                    }
                    if (geoType === 'Polygon') {
                        let areaFeat = this.vectorService.getTurfFeature(geoType, polyCoords);
                        const area_km = this.vectorService.getFeatureArea(areaFeat);
                        totalAreaCalc += area_km;
                        // console.log('start multipolygon length: '+areaFeat.geometry.coordinates.length);
                        if (areaFeat.geometry.coordinates.length > 10) {
                            areaFeat = this.vectorService.getSimplifiedFeature(areaFeat);
                        }
                        // console.log('end multipolygon length: '+areaFeat.geometry.coordinates.length);
                        polyCoords = areaFeat.geometry.coordinates;
                        turfSimple = this.vectorService.getTurfFeature(geoType, polyCoords);
                    }
                    const polySimple = geoJSONFormat.readFeature(turfSimple, {featureProjection: 'EPSG:3857'});
                    const simplegeometry = polySimple.getGeometry();
                    const fixedgeometry = simplegeometry.transform(this.mapProjection, this.wgs84Projection);
                    const wmswktString = wktFormat.writeGeometry(fixedgeometry);
                    const geocoords = fixedgeometry.getCoordinates();
                    const wfswktString = this.vectorService.writeWfsWktString(geoType, geocoords);
                }
                if (geoType === 'Circle') {
                    const center = selectedClone.getGeometry().getCenter();
                    const radius = selectedClone.getGeometry().getRadius();
                    const edgeCoordinate = [center[0] + radius, center[1]];
                    let groundRadius = haversineDistance(
                        transform(center, 'EPSG:3857', 'EPSG:4326'),
                        transform(edgeCoordinate, 'EPSG:3857', 'EPSG:4326')
                    );
                    groundRadius = groundRadius / 1000;
                    const circleArea = Math.PI * groundRadius * groundRadius;
                    totalAreaCalc += circleArea;
                }
            }
        });
        if (totalAreaCalc > 0) {
            totalAreaCalc = Number(totalAreaCalc.toFixed(2));
        }
        this.selectedShapeAreaSubject.next(totalAreaCalc);
    }

    clearSelections() {
        const selpoints = Object.assign([], this.selections);
        this.selections = Object.assign([], []);
        for (const i in selpoints) {
            if (!this.clusterPoints) {
                const point = this.findOccPoint(selpoints[i]);
                const style = this.setSymbol(point);
                point.setStyle(style);
            }
        }
        this.layers['pointv'].getSource().changed();
        // adjustSelectionsTab();
    }

    findOccPoint(occid) {
        const features = this.layers['pointv'].getSource().getFeatures();
        for (const f in features) {
            if (Number(features[f].get('occid')) === occid) {
                return features[f];
            }
        }
    }

    setClusterPointsValue(value: boolean) {
        this.clusterPointsSubject.next(value);
        if (this.clusterPointsSubject.value) {
            // this.removeDateSlider();
            // this.loadPointWFSLayer(0);
        } else {
            this.layers['pointv'].setSource(this.pointvectorsource);
        }
    }

    setClusterDistanceValue(value: number) {
        this.clusterDistanceSubject.next(value);
        // this.clustersource.setDistance(this.clusterDistanceSubject.value);
    }

    setShowHeatMapValue(value: boolean) {
        this.showHeatMapSubject.next(value);
        if (this.showHeatMapSubject.value) {
            this.layers['pointv'].setVisible(false);
            this.layers['heat'].setVisible(true);
        } else {
            if (this.returnClusters && !this.dateSliderActiveSubject.value) {
                this.returnClusters = false;
                this.setClusterPointsValue(true);
            }
            this.layers['heat'].setVisible(false);
            this.layers['pointv'].setVisible(true);
        }
    }

    setHeatMapRadiusValue(value: number) {
        this.heatMapRadiusSubject.next(value);
        this.layers['heat'].setRadius(parseInt(this.heatMapRadiusSubject.value.toString(), 10));
    }

    setHeatMapBlurValue(value: number) {
        this.heatMapBlurSubject.next(value);
        this.layers['heat'].setBlur(parseInt(this.heatMapBlurSubject.value.toString(), 10));
    }

    setDateSliderActiveValue(value: boolean) {
        this.dateSliderActiveSubject.next(value);
        /* if (this.dateSliderActiveSubject.value) {
            if (dsOldestDate && dsNewestDate) {
                if (dsOldestDate !== dsNewestDate) {
                    if (!this.clusterPointsSubject.value) {
                        // var dual = document.getElementById("dsdualtype").checked;
                        // createDateSlider(true);
                    } else {
                        this.returnClusters = true;
                        this.setClusterPointsValue(false);
                        // createDateSlider(true);
                    }
                } else {
                    this.alertService.showErrorSnackbar(
                        'The current records on the map do not have a range of dates for the Date Slider to populate.',
                        '',
                        5000
                    );
                }
            } else {
                this.dateSliderActiveSubject.next(false);
                this.alertService.showErrorSnackbar(
                    'Points must be loaded onto the map to use the Date Slider.',
                    '',
                    5000
                );
            }
        } else {
            // removeDateSlider();
        } */
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
        if (!this.map) {
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
                            if (this.clusterPointsSubject.value && targetFeature.get('features').length === 1) {
                                iFeature = targetFeature.get('features')[0];
                            } else if (!this.clusterPointsSubject.value) {
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
                            infoHTML += '<b>recordNumber:</b> ' + (iFeature.get('recordNumber') ? iFeature.get('recordNumber') : '')
                                + '<br />';
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
                            const errorMessage = this.translate.get('symbiota-spatial.map-service.singleclick_error1');
                            this.alertService.showErrorSnackbar(
                                errorMessage,
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
                                        const errorMessage = this.translate.get('symbiota-spatial.map-service.singleclick_error2');
                                        this.alertService.showErrorSnackbar(
                                            errorMessage,
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
        }

        return this.map;
    }

    getPointStyle(feature) {
        let style = '';
        if (this.clusterPointsSubject.value) {
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
                        removable: true,
                        visible: true
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
            const errorMessage = this.translate.get('symbiota-spatial.map-service.drag_drop_max_error1');
            this.alertService.showErrorSnackbar(
                errorMessage,
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

    deleteSelections() {
        this.selectInteraction.getFeatures().forEach((feature) => {
            this.layers['select'].getSource().removeFeature(feature);
        });
        this.selectInteraction.getFeatures().clear();
        if (this.layers['select'].getSource().getFeatures().length < 1) {
            this.removeLayerFromSelectorArr('select');
        }
    }

    openMapSettingsDialog(mapService: any) {
        const dialogRef = this.dialog.open(MapSettingsDialogComponent, {
            width: '500px',
            data: {
                mapService: mapService
            }
        });
    }

    openMapLayersDialog(mapService: any) {
        const dialogRef = this.dialog.open(MapLayersDialogComponent, {
            width: '500px',
            data: {
                mapService: mapService
            }
        });
    }

    downloadShapesLayer(dlType: string) {
        if (dlType) {
            if (this.selectInteraction.getFeatures().array_.length > 0) {
                let filetype = '';
                let format: any;
                if (dlType === 'kml') {
                    format = new KML();
                    filetype = 'application/vnd.google-earth.kml+xml';
                } else if (dlType === 'geojson') {
                    format = new GeoJSON();
                    filetype = 'application/vnd.geo+json';
                }
                const features = this.layers['select'].getSource().getFeatures();
                const fixedFeatures = this.setDownloadFeatures(features);
                let exportStr = format.writeFeatures(fixedFeatures, {
                    'dataProjection': this.wgs84Projection,
                    'featureProjection': this.mapProjection
                });
                if (dlType === 'kml') {
                    exportStr = exportStr.replace(
                        /<kml xmlns="http:\/\/www.opengis.net\/kml\/2.2" xmlns:gx="http:\/\/www.google.com\/kml\/ext\/2.2" xmlns:xsi="http:\/\/www.w3.org\/2001\/XMLSchema-instance" xsi:schemaLocation="http:\/\/www.opengis.net\/kml\/2.2 https:\/\/developers.google.com\/kml\/schema\/kml22gx.xsd">/g,
                        '<kml xmlns="http://www.opengis.net/kml/2.2"><Document id="root_doc">'
                        + '<Folder><name>shapes_export</name>');
                    exportStr = exportStr.replace(
                        /<Placemark>/g,
                        '<Placemark><Style><LineStyle><color>ff000000</color><width>1</width></LineStyle>'
                        + '<PolyStyle><color>4DAAAAAA</color><fill>1</fill></PolyStyle></Style>');
                    exportStr = exportStr.replace(/<Polygon>/g, '<Polygon><altitudeMode>clampToGround</altitudeMode>');
                    exportStr = exportStr.replace(/<\/kml>/g, '</Folder></Document></kml>');
                }
                const filename = 'shapes_' + this.sharedTools.getDateTimeString() + '.' + dlType;
                const blob = new Blob([exportStr], {type: filetype});
                if (window.navigator.msSaveOrOpenBlob) {
                    window.navigator.msSaveBlob(blob, filename);
                } else {
                    const elem = window.document.createElement('a');
                    elem.href = window.URL.createObjectURL(blob);
                    elem.download = filename;
                    document.body.appendChild(elem);
                    elem.click();
                    document.body.removeChild(elem);
                }
            } else {
                const errorMessage = this.translate.get('symbiota-spatial.map-service.no_shapes_selected');
                this.alertService.showErrorSnackbar(
                    errorMessage,
                    '',
                    5000
                );
            }
        } else {
            const errorMessage = this.translate.get('symbiota-spatial.map-service.select_download_type');
            this.alertService.showErrorSnackbar(
                errorMessage,
                '',
                5000
            );
        }
    }

    setDownloadFeatures(features) {
        const fixedFeatures = [];
        for (const i in features) {
            if (features[i]) {
                const clone = features[i].clone();
                const geoType = clone.getGeometry().getType();
                if (geoType === 'Circle') {
                    const geoJSONFormat = new GeoJSON();
                    const geometry = clone.getGeometry();
                    const fixedgeometry = geometry.transform(this.mapProjection, this.wgs84Projection);
                    const center = fixedgeometry.getCenter();
                    const radius = fixedgeometry.getRadius();
                    const turfCircle = this.vectorService.getWGS84CirclePoly(center, radius);
                    const circpoly = geoJSONFormat.readFeature(turfCircle);
                    circpoly.getGeometry().transform(this.wgs84Projection, this.mapProjection);
                    fixedFeatures.push(circpoly);
                } else {
                    fixedFeatures.push(clone);
                }
            }
        }
        return fixedFeatures;
    }

    createBuffers(bufferSize) {
        if (!isNaN(bufferSize) && (bufferSize > 0)) {
            if (this.selectInteraction.getFeatures().getArray().length >= 1) {
                this.selectInteraction.getFeatures().forEach((feature) => {
                    if (feature) {
                        const selectedClone = feature.clone();
                        const geoType = selectedClone.getGeometry().getType();
                        const geoJSONFormat = new GeoJSON();
                        const selectiongeometry = selectedClone.getGeometry();
                        const fixedselectgeometry = selectiongeometry.transform(this.mapProjection, this.wgs84Projection);
                        const geojsonStr = geoJSONFormat.writeGeometry(fixedselectgeometry);
                        const featCoords = JSON.parse(geojsonStr).coordinates;
                        let turfFeature = {};
                        if (geoType !== 'Circle') {
                            turfFeature = this.vectorService.getTurfFeature(geoType, featCoords);
                        } else {
                            const center = fixedselectgeometry.getCenter();
                            const radius = fixedselectgeometry.getRadius();
                            turfFeature = this.vectorService.getWGS84CirclePoly(center, radius);
                        }
                        const buffered = this.vectorService.getBufferFeature(turfFeature, bufferSize);
                        const buffpoly = geoJSONFormat.readFeature(buffered);
                        buffpoly.getGeometry().transform(this.wgs84Projection, this.mapProjection);
                        this.selectsource.addFeature(buffpoly);
                        this.bufferDistanceSubject.next(0);
                    }
                });
            } else {
                const errorMessage = this.translate.get('symbiota-spatial.map-service.buffer_error1');
                this.alertService.showErrorSnackbar(
                    errorMessage,
                    '',
                    5000
                );
            }
        } else {
            const errorMessage = this.translate.get('symbiota-spatial.map-service.buffer_error2');
            this.alertService.showErrorSnackbar(
                errorMessage,
                '',
                5000
            );
        }
    }

    createPolyDifference() {
        let shapeCount = 0;
        this.selectInteraction.getFeatures().forEach((feature) => {
            const selectedClone = feature.clone();
            const geoType = selectedClone.getGeometry().getType();
            if (geoType === 'Polygon' || geoType === 'MultiPolygon' || geoType === 'Circle') {
                shapeCount++;
            }
        });
        if (shapeCount === 2) {
            const features = [];
            const geoJSONFormat = new GeoJSON();
            this.selectInteraction.getFeatures().forEach((feature) => {
                if (feature) {
                    const selectedClone = feature.clone();
                    const geoType = selectedClone.getGeometry().getType();
                    const selectiongeometry = selectedClone.getGeometry();
                    const fixedselectgeometry = selectiongeometry.transform(this.mapProjection, this.wgs84Projection);
                    const geojsonStr = geoJSONFormat.writeGeometry(fixedselectgeometry);
                    const featCoords = JSON.parse(geojsonStr).coordinates;
                    if (geoType !== 'Circle') {
                        features.push(this.vectorService.getTurfFeature(geoType, featCoords));
                    } else {
                        const center = fixedselectgeometry.getCenter();
                        const radius = fixedselectgeometry.getRadius();
                        features.push(this.vectorService.getWGS84CirclePoly(center, radius));
                    }
                }
            });
            const difference = this.vectorService.getDifferenceFeature(features[0], features[1]);
            if (difference) {
                const diffpoly = geoJSONFormat.readFeature(difference);
                diffpoly.getGeometry().transform(this.wgs84Projection, this.mapProjection);
                this.selectsource.addFeature(diffpoly);
            }
        } else {
            const errorMessage = this.translate.get('symbiota-spatial.map-service.difference_error1');
            this.alertService.showErrorSnackbar(
                errorMessage,
                '',
                5000
            );
        }
    }

    createPolyIntersect() {
        let shapeCount = 0;
        this.selectInteraction.getFeatures().forEach((feature) => {
            const selectedClone = feature.clone();
            const geoType = selectedClone.getGeometry().getType();
            if (geoType === 'Polygon' || geoType === 'MultiPolygon' || geoType === 'Circle') {
                shapeCount++;
            }
        });
        if (shapeCount === 2) {
            const features = [];
            const geoJSONFormat = new GeoJSON();
            this.selectInteraction.getFeatures().forEach((feature) => {
                if (feature) {
                    const selectedClone = feature.clone();
                    const geoType = selectedClone.getGeometry().getType();
                    const selectiongeometry = selectedClone.getGeometry();
                    const fixedselectgeometry = selectiongeometry.transform(this.mapProjection, this.wgs84Projection);
                    const geojsonStr = geoJSONFormat.writeGeometry(fixedselectgeometry);
                    const featCoords = JSON.parse(geojsonStr).coordinates;
                    if (geoType !== 'Circle') {
                        features.push(this.vectorService.getTurfFeature(geoType, featCoords));
                    } else {
                        const center = fixedselectgeometry.getCenter();
                        const radius = fixedselectgeometry.getRadius();
                        features.push(this.vectorService.getWGS84CirclePoly(center, radius));
                    }
                }
            });
            const intersection = this.vectorService.getIntersectFeature(features[0], features[1]);
            if (intersection) {
                const interpoly = geoJSONFormat.readFeature(intersection);
                interpoly.getGeometry().transform(this.wgs84Projection, this.mapProjection);
                this.selectsource.addFeature(interpoly);
            } else {
                const errorMessage = this.translate.get('symbiota-spatial.map-service.intersect_error1');
                this.alertService.showErrorSnackbar(
                    errorMessage,
                    '',
                    5000
                );
            }
        } else {
            const errorMessage = this.translate.get('symbiota-spatial.map-service.intersect_error2');
            this.alertService.showErrorSnackbar(
                errorMessage,
                '',
                5000
            );
        }
    }

    createPolyUnion() {
        let shapeCount = 0;
        this.selectInteraction.getFeatures().forEach((feature) => {
            const selectedClone = feature.clone();
            const geoType = selectedClone.getGeometry().getType();
            if (geoType === 'Polygon' || geoType === 'MultiPolygon' || geoType === 'Circle') {
                shapeCount++;
            }
        });
        if (shapeCount > 1) {
            const features = [];
            const geoJSONFormat = new GeoJSON();
            this.selectInteraction.getFeatures().forEach((feature) => {
                if (feature) {
                    const selectedClone = feature.clone();
                    const geoType = selectedClone.getGeometry().getType();
                    const selectiongeometry = selectedClone.getGeometry();
                    const fixedselectgeometry = selectiongeometry.transform(this.mapProjection, this.wgs84Projection);
                    const geojsonStr = geoJSONFormat.writeGeometry(fixedselectgeometry);
                    const featCoords = JSON.parse(geojsonStr).coordinates;
                    if (geoType !== 'Circle') {
                        features.push(this.vectorService.getTurfFeature(geoType, featCoords));
                    } else {
                        const center = fixedselectgeometry.getCenter();
                        const radius = fixedselectgeometry.getRadius();
                        features.push(this.vectorService.getWGS84CirclePoly(center, radius));
                    }
                }
            });
            let union = this.vectorService.getUnionFeature(features[0], features[1]);
            for (const f in features) {
                if (Number(f) > 1) {
                    union = this.vectorService.getUnionFeature(union, features[f]);
                }
            }
            if (union) {
                this.deleteSelections();
                const unionpoly = geoJSONFormat.readFeature(union);
                unionpoly.getGeometry().transform(this.wgs84Projection, this.mapProjection);
                this.selectsource.addFeature(unionpoly);
                this.setActiveLayer('select');
            }
        } else {
            const errorMessage = this.translate.get('symbiota-spatial.map-service.union_error1');
            this.alertService.showErrorSnackbar(
                errorMessage,
                '',
                5000
            );
        }
    }

    createConcavePoly(source: string, maxEdge: number) {
        let features = {};
        const geoJSONFormat = new GeoJSON();
        if (maxEdge > 0) {
            if (source === 'all') {
                features = this.getTurfPointFeaturesetAll();
            } else if (source === 'selected') {
                if (this.selections.length >= 3) {
                    features = this.getTurfPointFeaturesetSelected();
                } else {
                    const errorMessage = this.translate.get('symbiota-spatial.map-service.concave_error1');
                    this.alertService.showErrorSnackbar(
                        errorMessage,
                        '',
                        5000
                    );
                    return;
                }
            }
            if (features) {
                let concavepoly = {};
                try {
                    concavepoly = this.vectorService.getConcavePolyFeature(features, Number(maxEdge));
                } catch (e) {
                    const errorMessage = this.translate.get('symbiota-spatial.map-service.concave_error2');
                    this.alertService.showErrorSnackbar(
                        errorMessage,
                        '',
                        5000
                    );
                }
                if (concavepoly) {
                    const cnvepoly = geoJSONFormat.readFeature(concavepoly);
                    cnvepoly.getGeometry().transform(this.wgs84Projection, this.mapProjection);
                    this.selectsource.addFeature(cnvepoly);
                }
            } else {
                const errorMessage = this.translate.get('symbiota-spatial.map-service.concave_error3');
                this.alertService.showErrorSnackbar(
                    errorMessage,
                    '',
                    5000
                );
            }
            this.concaveMaxEdgeLengthSubject.next(0);
        } else {
            const errorMessage = this.translate.get('symbiota-spatial.map-service.concave_error4');
            this.alertService.showErrorSnackbar(
                errorMessage,
                '',
                5000
            );
        }
    }

    createConvexPoly(source: string) {
        let features = {};
        const geoJSONFormat = new GeoJSON();
        if (source === 'all') {
            features = this.getTurfPointFeaturesetAll();
        } else if (source === 'selected') {
            if (this.selections.length >= 3) {
                features = this.getTurfPointFeaturesetSelected();
            } else {
                const errorMessage = this.translate.get('symbiota-spatial.map-service.convex_error1');
                this.alertService.showErrorSnackbar(
                    errorMessage,
                    '',
                    5000
                );
                return;
            }
        }
        if (features) {
            const convexpoly = this.vectorService.getConvexPolyFeature(features);
            if (convexpoly) {
                const cnvxpoly = geoJSONFormat.readFeature(convexpoly);
                cnvxpoly.getGeometry().transform(this.wgs84Projection, this.mapProjection);
                this.selectsource.addFeature(cnvxpoly);
            }
        } else {
            const errorMessage = this.translate.get('symbiota-spatial.map-service.convex_error2');
            this.alertService.showErrorSnackbar(
                errorMessage,
                '',
                5000
            );
        }
    }

    getTurfPointFeaturesetAll() {
        const turfFeatureArr = [];
        const geoJSONFormat = new GeoJSON();
        if (this.clusterPoints) {
            const clusters = this.layers['pointv'].getSource().getFeatures();
            for (const c in clusters) {
                if (clusters[c]) {
                    const cFeatures = clusters[c].get('features');
                    for (const f in cFeatures) {
                        if (cFeatures[f]) {
                            const selectedClone = cFeatures[f].clone();
                            const selectiongeometry = selectedClone.getGeometry();
                            const fixedselectgeometry = selectiongeometry.transform(this.mapProjection, this.wgs84Projection);
                            const geojsonStr = geoJSONFormat.writeGeometry(fixedselectgeometry);
                            const pntCoords = JSON.parse(geojsonStr).coordinates;
                            turfFeatureArr.push(this.vectorService.getTurfFeature('Point', pntCoords));
                        }
                    }
                }
            }
        } else {
            const features = this.layers['pointv'].getSource().getFeatures();
            for (const f in features) {
                if (features[f]) {
                    const selectedClone = features[f].clone();
                    const selectiongeometry = selectedClone.getGeometry();
                    const fixedselectgeometry = selectiongeometry.transform(this.mapProjection, this.wgs84Projection);
                    const geojsonStr = geoJSONFormat.writeGeometry(fixedselectgeometry);
                    const pntCoords = JSON.parse(geojsonStr).coordinates;
                    turfFeatureArr.push(this.vectorService.getTurfFeature('Point', pntCoords));
                }
            }
        }
        if (turfFeatureArr.length >= 3) {
            return this.vectorService.getTurfFeatureCollection(turfFeatureArr);
        } else {
            return false;
        }
    }

    getTurfPointFeaturesetSelected() {
        const turfFeatureArr = [];
        const geoJSONFormat = new GeoJSON();
        for (const i in this.selections) {
            if (this.selections[i]) {
                let point: any;
                if (this.clusterPoints) {
                    const cluster = this.findOccCluster(this.selections[i]);
                    point = MapService.findOccPointInCluster(cluster, this.selections[i]);
                } else {
                    point = this.findOccPoint(this.selections[i]);
                }
                if (point) {
                    const selectedClone = point.clone();
                    const selectiongeometry = selectedClone.getGeometry();
                    const fixedselectgeometry = selectiongeometry.transform(this.mapProjection, this.wgs84Projection);
                    const geojsonStr = geoJSONFormat.writeGeometry(fixedselectgeometry);
                    const pntCoords = JSON.parse(geojsonStr).coordinates;
                    turfFeatureArr.push(this.vectorService.getTurfFeature('Point', pntCoords));
                }
            }
        }
        if (turfFeatureArr.length >= 3) {
            return this.vectorService.getTurfFeatureCollection(turfFeatureArr);
        } else {
            return false;
        }
    }

    findOccCluster(occid: number) {
        const clusters = this.layers['pointv'].getSource().getFeatures();
        for (const c in clusters) {
            if (clusters[c]) {
                const clusterindex = clusters[c].get('identifiers');
                if (clusterindex.indexOf(Number(occid)) !== -1) {
                    return clusters[c];
                }
            }
        }
    }
}
