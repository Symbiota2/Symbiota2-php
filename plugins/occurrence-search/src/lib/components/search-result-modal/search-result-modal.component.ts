import {Component, Inject, OnInit} from "@angular/core";
import { OccurrenceSearchResult, OccurrenceService } from "occurrence";
import { MAT_DIALOG_DATA, MatDialogRef } from "@angular/material";
import { AuthService } from "symbiota-auth";
import { CollectionDetails } from "collection";

@Component({
    selector: "occurrence-search-search-result-modal",
    templateUrl: "./search-result-modal.component.html",
    styleUrls: ["./search-result-modal.component.less"]
})
export class SearchResultModalComponent implements OnInit {
    public collection: CollectionDetails;
    public collectionLoaded = false;

    constructor(
        public dialogRef: MatDialogRef<SearchResultModalComponent>,
        @Inject(MAT_DIALOG_DATA) public occurrence: OccurrenceSearchResult,
        private occurrenceService: OccurrenceService,
        private authService: AuthService
    ) {}

    ngOnInit() {
        this.occurrenceService.getCollectionForOccurrence(this.occurrence.collectionUrl)
            .subscribe((collection) => {
                this.collection = collection;
                this.collectionLoaded = true;
            });
    }

    onEditClick() {
        console.log(this.authService.getCurrentPermissions());
    }

    onCloseClick() {
        this.dialogRef.close();
    }
}
