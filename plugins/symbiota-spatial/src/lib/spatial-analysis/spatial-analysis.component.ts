import {Component, Input, OnInit, ViewEncapsulation, OnDestroy} from '@angular/core';

import OlMap from 'ol/Map';

import {MapService} from '../map.service';

import {Layer} from '../layer.model';

@Component({
    selector: 'symbiota-spatial-spatial-analysis',
    templateUrl: './spatial-analysis.component.html',
    encapsulation: ViewEncapsulation.None,
    styleUrls: [
        '../../../../../node_modules/ol/ol.css',
        './symbiota-ol.css',
        './spatial-analysis.component.css'
    ]
})
export class SpatialAnalysisComponent implements OnInit, OnDestroy {
    @Input() params: any;
    map: OlMap;
    drawSelectedValue: string;
    activeLayerValue: string;
    layersArr: Layer[];
    popupContainer: any;
    popupCloser: any;
    popupContent: any;
    finderPopupContainer: any;
    finderPopupCloser: any;
    finderPopupContent: any;

    constructor(
        public mapService: MapService
    ) {
        this.mapService.setMapId('analysis');
        this.mapService.drawToolSelectedValue.subscribe(value => {
            this.drawSelectedValue = value.toString();
        });
        this.mapService.layersSelectorArr.subscribe(value => {
            this.layersArr = value;
        });
        this.mapService.activeLayerValue.subscribe(value => {
            this.activeLayerValue = value.toString();
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

        this.popupContainer = document.getElementById('popup');
        this.popupContent = document.getElementById('popup-content');
        this.popupCloser = document.getElementById('popup-closer');
        this.mapService.initializePopup(this.popupContainer, this.popupContent, this.popupCloser);

        this.finderPopupContainer = document.getElementById('finderpopup');
        this.finderPopupContent = document.getElementById('finderpopup-content');
        this.finderPopupCloser = document.getElementById('finderpopup-closer');
        this.mapService.initializeFinderPopup(this.finderPopupContainer, this.finderPopupContent, this.finderPopupCloser);
    }

    baseMapSelectChange(event) {
        this.mapService.changeBaseMap(event.value);
    }

    activeLayerChange(event) {
        this.mapService.setActiveLayer(event.value);
    }

    drawToolSelectChange(event) {
        this.mapService.changeDrawTool(event.value);
    }

    onDeleteSelections() {
        this.mapService.deleteSelections();
    }

    onMapSettingsOpen() {
        this.mapService.openMapSettingsDialog(this.mapService);
    }

    onMapLayersOpen() {
        this.mapService.openMapLayersDialog(this.mapService);
    }

    ngOnDestroy() {
        this.mapService.destroyMap();
    }
}
