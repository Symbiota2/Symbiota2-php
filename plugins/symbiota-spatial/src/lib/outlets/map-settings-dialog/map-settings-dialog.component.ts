import {Component, Inject} from '@angular/core';
import {MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';

@Component({
    selector: 'app-map-settings-dialog',
    templateUrl: './map-settings-dialog.component.html',
    styleUrls: ['./map-settings-dialog.component.css']
})
export class MapSettingsDialogComponent {
    mapService: any;
    clusterPoints: boolean;
    clusterDistance: number;
    showHeatMap: boolean;
    heatMapRadius: number;
    heatMapBlur: number;
    dateSliderActive: boolean;

    constructor(
        @Inject(MAT_DIALOG_DATA) public data: any,
        public dialogRef: MatDialogRef<MapSettingsDialogComponent>
    ) {
        this.mapService = this.data.mapService;
        this.mapService.clusterPointsValue.subscribe(value => {
            this.clusterPoints = value;
        });
        this.mapService.clusterDistanceValue.subscribe(value => {
            this.clusterDistance = value;
        });
        this.mapService.showHeatMapValue.subscribe(value => {
            this.showHeatMap = value;
        });
        this.mapService.heatMapRadiusValue.subscribe(value => {
            this.heatMapRadius = value;
        });
        this.mapService.heatMapBlurValue.subscribe(value => {
            this.heatMapBlur = value;
        });
        this.mapService.dateSliderActiveValue.subscribe(value => {
            this.dateSliderActive = value;
        });
    }

    clusterPointsChange(event) {
        this.mapService.setClusterPointsValue(event.checked);
    }

    clusterDistanceChange(event) {
        this.mapService.setClusterDistanceValue(event.value);
    }

    showHeatMapChange(event) {
        this.mapService.setShowHeatMapValue(event.checked);
    }

    heatMapRadiusChange(event) {
        this.mapService.setHeatMapRadiusValue(event.value);
    }

    heatMapBlurChange(event) {
        this.mapService.setHeatMapBlurValue(event.value);
    }

    dateSliderActiveChange(event) {
        this.mapService.setDateSliderActiveValue(event.checked);
    }
}
