import {
    Component,
    Input,
} from "@angular/core";

@Component({
    selector: "occurrence-search-search-result",
    templateUrl: "./search-result.component.html",
    styleUrls: ["../../occurrence-search.less", "./search-result.component.less"]
})
export class SearchResultComponent {
    @Input() occurrenceID: number;
    @Input() catalogNumber: string;
    @Input() collectionUrl: string;
    @Input() scientificName: string;
    @Input() recordedBy: string;
    @Input() country: string;
    @Input() stateProvince: string;

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
}
