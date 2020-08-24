import {Component, Inject} from "@angular/core";
import { Occurrence } from "occurrence";
import { MAT_DIALOG_DATA, MatDialogRef } from "@angular/material";

@Component({
    selector: "occurrence-search-search-result-modal",
    templateUrl: "./search-result-modal.component.html",
    styleUrls: ["../../occurrence-search.less"]
})
export class SearchResultModalComponent {
    constructor(
        public dialogRef: MatDialogRef<SearchResultModalComponent>,
        @Inject(MAT_DIALOG_DATA) public occurrence: Occurrence
    ) {}

    onCloseClick(): void {
        this.dialogRef.close();
    }
}
