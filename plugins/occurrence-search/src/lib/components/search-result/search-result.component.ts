import {
    Component,
    Input,
} from "@angular/core";
import {Occurrence} from "occurrence";
import { MatDialog } from "@angular/material";
import {SearchResultModalComponent} from "../search-result-modal/search-result-modal.component";

@Component({
    selector: "occurrence-search-search-result",
    templateUrl: "./search-result.component.html",
    styleUrls: ["../../occurrence-search.less", "./search-result.component.less"]
})
export class SearchResultComponent {
    @Input() occurrence: Occurrence;

    // Coerce eventDate string to Date
    @Input()
    get eventDate(): Date {
        return this._eventDate;
    }

    set eventDate(date: Date) {
        if (typeof date === "string") {
            date = new Date(date);
        }
        this._eventDate = date;
    }

    private _eventDate: Date;

    constructor(public dialog: MatDialog) {
    }

    openDialog(): void {
        this.dialog.open(SearchResultModalComponent, {
            data: Object.assign({}, this.occurrence, { eventDate: this.eventDate }),
            width: "80rem"
        });
    }
}
