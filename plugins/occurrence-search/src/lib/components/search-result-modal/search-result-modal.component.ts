import {Component, Inject, OnInit} from "@angular/core";
import {Occurrence, OccurrenceService} from "occurrence";
import { MAT_DIALOG_DATA, MatDialogRef } from "@angular/material";

@Component({
    selector: "occurrence-search-search-result-modal",
    templateUrl: "./search-result-modal.component.html",
    styleUrls: ["./search-result-modal.component.less"]
})
export class SearchResultModalComponent implements OnInit {
    constructor(
        public dialogRef: MatDialogRef<SearchResultModalComponent>,
        @Inject(MAT_DIALOG_DATA) public occurrence: Occurrence,
        private occurrenceService: OccurrenceService
    ) {}

    ngOnInit() {
        this.occurrenceService.getCollectionForOccurrence(this.occurrence.id)
            .subscribe((collection) => {
                console.log(JSON.stringify(collection));
            });
    }

    onCloseClick(): void {
        this.dialogRef.close();
    }
}
