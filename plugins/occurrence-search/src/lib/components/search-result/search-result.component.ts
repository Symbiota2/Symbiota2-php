import {
    Component,
    Input,
} from "@angular/core";
import { MatDialog } from "@angular/material";
import {SearchResultModalComponent} from "../search-result-modal/search-result-modal.component";
import { OccurrenceSearchResult } from "occurrence";

@Component({
    selector: "occurrence-search-search-result",
    templateUrl: "./search-result.component.html",
    styleUrls: ["../../occurrence-search.less", "./search-result.component.less"]
})
export class SearchResultComponent {
    @Input() occurrence: OccurrenceSearchResult;

    constructor(public dialog: MatDialog) { }

    openDialog(): void {
        this.dialog.open(SearchResultModalComponent, {
            data: this.occurrence,
            width: "80rem"
        });
    }
}
