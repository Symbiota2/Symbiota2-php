import { Component, OnInit } from "@angular/core";
import { OccurrenceService, Occurrence } from "occurrence";

@Component({
    selector: "occurrence-search-search-results-page",
    templateUrl: "./search-results-page.component.html"
})
export class SearchResultsPageComponent implements OnInit {
    public results: Occurrence[] = [];

    constructor(private occurrenceService: OccurrenceService) { }

    ngOnInit() {
        this.occurrenceService.getOccurrences().subscribe((occurrences: Occurrence[]) => {
            console.log(occurrences);
            this.results = occurrences;
        });
    }
}
