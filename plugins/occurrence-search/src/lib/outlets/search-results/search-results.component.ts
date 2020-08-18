import { Component, OnInit } from "@angular/core";
import { OccurrenceService, Occurrence } from "occurrence";
import { ActivatedRoute } from "@angular/router";
import {
    FORM_KEY_COLLIDS,
    FORM_KEY_TAXON_TYPE,
    FORM_KEY_TAXON_SEARCH, TaxonSearchType
} from "../../shared";

const COLLID_PREFIX = "/api/collections";

@Component({
    selector: "occurrence-search-search-results",
    templateUrl: "./search-results.component.html",
    styleUrls: ["../../occurrence-search.less"]
})
export class SearchResultsComponent implements OnInit {
    public results: Occurrence[] = [];

    private collectionIDs: number[] = [];
    private taxonSearchType: TaxonSearchType = null;
    private taxonSearchText = "";

    constructor(
        private currentRoute: ActivatedRoute,
        private occurrenceService: OccurrenceService
    ) { }

    ngOnInit() {
        const qParams = this.currentRoute.snapshot.queryParamMap;

        if (qParams.has(FORM_KEY_COLLIDS)) {
            this.collectionIDs = qParams.getAll(FORM_KEY_COLLIDS)
                .map((collID) => parseInt(collID));
        }

        if (qParams.has(FORM_KEY_TAXON_TYPE)) {
            this.taxonSearchType = parseInt(qParams.get(FORM_KEY_TAXON_TYPE));
        }

        if (qParams.has(FORM_KEY_TAXON_SEARCH)) {
            this.taxonSearchText = qParams.get(FORM_KEY_TAXON_SEARCH);
        }

        this.occurrenceService.getOccurrences().subscribe((occurrences: Occurrence[]) => {
            this.results = occurrences;
        });
    }
}