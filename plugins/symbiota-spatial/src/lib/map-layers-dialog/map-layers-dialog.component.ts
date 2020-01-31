import {Component, Inject} from '@angular/core';
import {MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';

import {Layer} from '../interfaces/layer.interface';

@Component({
    selector: 'app-map-layers-dialog',
    templateUrl: './map-layers-dialog.component.html',
    styleUrls: ['./map-layers-dialog.component.css']
})
export class MapLayersDialogComponent {
    mapService: any;
    layersArr: Layer[];

    constructor(
        @Inject(MAT_DIALOG_DATA) public data: any,
        public dialogRef: MatDialogRef<MapLayersDialogComponent>
    ) {
        this.mapService = this.data.mapService;
        this.mapService.layersSelectorArr.subscribe(value => {
            this.layersArr = value;
        });
    }

    layerToggleChange(event, layerName) {
        this.mapService.toggleLayer(event.checked, layerName);
    }

    onLayerDelete(layerName) {
        if (this.layersArr.length === 2) {
            this.dialogRef.close();
        }
        this.mapService.removeLayer(layerName);
    }
}
