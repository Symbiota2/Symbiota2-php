import {Component, Inject} from '@angular/core';
import {MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';

export interface DependencyDialogData {
    openText: string;
    dependencies: string[];
    action: string;
}

@Component({
    selector: 'app-plugin-dependency-dialog',
    templateUrl: './plugin-dependency-dialog.component.html',
    styleUrls: ['./plugin-dependency-dialog.component.css']
})
export class PluginDependencyDialogComponent {

    constructor(
        @Inject(MAT_DIALOG_DATA) public data: DependencyDialogData,
        public dialogRef: MatDialogRef<PluginDependencyDialogComponent>
    ) {}
}
