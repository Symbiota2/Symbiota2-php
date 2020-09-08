import {Component, Inject, OnInit} from "@angular/core";
import { OccurrenceSearchResult, OccurrenceService } from "occurrence";
import { MAT_DIALOG_DATA, MatDialogRef } from "@angular/material";
import { AuthService } from "symbiota-auth";

@Component({
    selector: "occurrence-search-search-result-modal",
    templateUrl: "./search-result-modal.component.html",
    styleUrls: ["./search-result-modal.component.less"]
})
export class SearchResultModalComponent implements OnInit {
    constructor(
        public dialogRef: MatDialogRef<SearchResultModalComponent>,
        @Inject(MAT_DIALOG_DATA) public occurrence: OccurrenceSearchResult,
        private authService: AuthService
    ) {}

    ngOnInit() {
        // this.occurrenceService.getCollectionForOccurrence(this.occurrence.id)
        //     .subscribe((collection) => {
        //         console.log(JSON.stringify(collection));
        //     });
        console.log(this.authService.getCurrentPermissions());
    }

    onEditClick() {

    }

    onCloseClick() {
        this.dialogRef.close();
    }
}
