import {Component, OnInit} from "@angular/core";
import {Occurrence, OccurrenceService, OccurrenceSearchParams} from "occurrence";
import {ActivatedRoute} from "@angular/router";
import {
    FORM_KEY_COLLIDS,
    FORM_KEY_TAXON_SEARCH,
    FORM_KEY_TAXON_TYPE,
    TaxonSearchType
} from "../../shared";
import { first } from "rxjs/operators";

@Component({
    selector: "occurrence-search-search-results",
    templateUrl: "./search-results.component.html",
    styleUrls: ["../../occurrence-search.less"]
})
export class SearchResultsComponent implements OnInit {
    public occurrences: Occurrence[] = [];

    private collectionIDs: number[] = [];
    private taxonSearchType: TaxonSearchType = null;
    private taxonSearchText = "";

    constructor(
        private currentRoute: ActivatedRoute,
        private occurrenceService: OccurrenceService
    ) { }

    ngOnInit() {
        const incomingQParams = this.currentRoute.snapshot.queryParamMap;
        const outgoingQParams: OccurrenceSearchParams = {};

        if (incomingQParams.has(FORM_KEY_COLLIDS)) {
            this.collectionIDs = incomingQParams.getAll(FORM_KEY_COLLIDS)
                .map((collID) => parseInt(collID));

            outgoingQParams["collection.id"] = this.collectionIDs;
        }

        // TODO: Search by taxon
        if (incomingQParams.has(FORM_KEY_TAXON_TYPE) && incomingQParams.has(FORM_KEY_TAXON_SEARCH)) {
            this.taxonSearchType = parseInt(incomingQParams.get(FORM_KEY_TAXON_TYPE));
            this.taxonSearchText = incomingQParams.get(FORM_KEY_TAXON_SEARCH);

            switch (this.taxonSearchType) {
                // TODO: Family OR Sciname
                case TaxonSearchType.TYPE_FAM_OR_SCINAME:
                    break;
                case TaxonSearchType.TYPE_FAM_ONLY:
                    outgoingQParams["family"] = this.taxonSearchText;
                    break;
                case TaxonSearchType.TYPE_SCINAME_ONLY:
                    outgoingQParams["scientificName"] = this.taxonSearchText;
                    break;
                case TaxonSearchType.TYPE_HIGHER_TAXON:
                    outgoingQParams["higherTaxon"] = this.taxonSearchText;
                    break;
                // TODO: Common name
                case TaxonSearchType.TYPE_COMMON_NAME:
                    break;
                default:
                    break;
            }
        }

        const resultObs = this.occurrenceService.getOccurrences(outgoingQParams);
        resultObs.pipe(first()).subscribe((occurrences: Occurrence[]) => {
            this.occurrences = occurrences;
        });
    }
}
