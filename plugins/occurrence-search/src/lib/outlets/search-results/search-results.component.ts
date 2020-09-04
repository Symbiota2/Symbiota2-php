import {Component, OnInit} from "@angular/core";
import {
    Occurrence, OccurrenceSearchParams,
    OccurrenceService,
    TaxonSearchTypes
} from "occurrence";

import {ActivatedRoute, Params, Router} from "@angular/router";

import {
    Q_PARAM_CAT_NUM,
    Q_PARAM_COLLIDS,
    Q_PARAM_TAXON_SEARCH,
    Q_PARAM_TAXON_TYPE,
} from "../../include";

@Component({
    selector: "occurrence-search-search-results",
    templateUrl: "./search-results.component.html",
    styleUrls: ["./search-results.component.less"]
})
export class SearchResultsComponent implements OnInit {
    private static readonly PREV_PAGE = "../criteria";

    public isLoading = true;
    public occurrences: Occurrence[] = [];
    private collectionIDs: number[] = [];
    private catalogNumber: string = "";
    private taxonSearchType: string = "";
    private taxonSearchStr: string = "";

    public currentPage = 1;

    constructor(
        private router: Router,
        private currentRoute: ActivatedRoute,
        private occurrenceService: OccurrenceService) { }

    ngOnInit() {
        const incomingQParams = this.currentRoute.snapshot.queryParamMap;

        if (incomingQParams.has(Q_PARAM_COLLIDS)) {
            this.collectionIDs = incomingQParams.getAll(Q_PARAM_COLLIDS)
                .map((collID) => parseInt(collID));

            if (incomingQParams.has(Q_PARAM_CAT_NUM)) {
                this.catalogNumber = incomingQParams.get(Q_PARAM_CAT_NUM);
            }

            if (incomingQParams.has(Q_PARAM_TAXON_TYPE) &&
                incomingQParams.has(Q_PARAM_TAXON_SEARCH)) {

                const searchType = incomingQParams.get(Q_PARAM_TAXON_TYPE);

                if (TaxonSearchTypes.includes(searchType)) {
                    this.taxonSearchType = searchType;
                    this.taxonSearchStr = incomingQParams.get(Q_PARAM_TAXON_SEARCH);
                }
            }

            this.loadOccurrences();
        }
        else {
            this.backToCriteria();
        }
    }

    loadOccurrences() {
        this.isLoading = true;
        this.occurrenceService.getOccurrences(this.getApiQueryParams())
            .subscribe((occurrences: Occurrence[]) => {
                this.occurrences = occurrences;
                this.isLoading = false;
            });
    }

    getCriteriaQueryParams(): Params {
        const qParams = { [Q_PARAM_COLLIDS]: this.collectionIDs };

        if (this.catalogNumber !== "") {
            qParams[Q_PARAM_CAT_NUM] = this.catalogNumber;
        }

        if (this.taxonSearchType !== "" && this.taxonSearchStr !== "") {
            qParams[Q_PARAM_TAXON_TYPE] = this.taxonSearchType;
            qParams[Q_PARAM_TAXON_SEARCH] = this.taxonSearchStr;
        }

        return qParams;
    }

    getApiQueryParams(): OccurrenceSearchParams {
        const qParams = {
            "page": this.currentPage,
            [Q_PARAM_COLLIDS]: this.collectionIDs
        };

        if (this.catalogNumber !== "") {
            qParams[Q_PARAM_CAT_NUM] = this.catalogNumber;
        }

        if (this.taxonSearchType !== "" && this.taxonSearchStr !== "") {
            qParams[this.taxonSearchType] = this.taxonSearchStr;
        }

        return qParams;
    }

    async prevPage() {
        if (this.currentPage > 1) {
            this.currentPage -= 1;
        }
        this.loadOccurrences();
    }

    async nextPage() {
        this.currentPage += 1;
        this.loadOccurrences();
    }

    async backToCriteria() {
        await this.router.navigate(
            [SearchResultsComponent.PREV_PAGE],
            {
                relativeTo: this.currentRoute,
                queryParams: this.getCriteriaQueryParams()
            }
        );
    }
}
