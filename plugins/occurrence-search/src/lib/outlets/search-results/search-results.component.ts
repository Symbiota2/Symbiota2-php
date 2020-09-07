import {Component, OnInit} from "@angular/core";
import {
    Occurrence, OccurrenceSearchParams,
    OccurrenceService
} from "occurrence";

import {ActivatedRoute, Params, Router} from "@angular/router";
import {QueryParserService} from "../../services/query-parser.service";

@Component({
    selector: "occurrence-search-search-results",
    templateUrl: "./search-results.component.html",
    styleUrls: ["./search-results.component.less"]
})
export class SearchResultsComponent implements OnInit {
    private static readonly PREV_PAGE = "../criteria";
    private static readonly COLLECTION_PAGE = "..";

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
        private queryParams: QueryParserService,
        private occurrenceService: OccurrenceService) { }

    ngOnInit() {
        this.collectionIDs = this.queryParams.getCollectionIDs();
        this.catalogNumber = this.queryParams.getCatalogNumber();
        this.taxonSearchType = this.queryParams.getTaxonSearchType();
        this.taxonSearchStr = this.queryParams.getTaxonSearchStr();

        if (this.collectionIDs.length > 0) {
            this.loadOccurrences();
        }
        else {
            this.backToCollections();
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
        return this.queryParams.getFrontendQueryBuilder()
            .setCollectionIDs(this.collectionIDs)
            .setCatalogNumber(this.catalogNumber)
            .setTaxonSearch(this.taxonSearchType, this.taxonSearchStr)
            .build();
    }

    getApiQueryParams(): OccurrenceSearchParams {
        return this.queryParams.getApiQueryBuilder()
            .setCollectionIDs(this.collectionIDs)
            .setCatalogNumber(this.catalogNumber)
            .setTaxonSearch(this.taxonSearchType, this.taxonSearchStr)
            .setPage(this.currentPage)
            .build();
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

    async backToCollections() {
        await this.router.navigate(
            [SearchResultsComponent.COLLECTION_PAGE],
            {
                relativeTo: this.currentRoute,
                queryParams: this.getCriteriaQueryParams()
            }
        );
    }
}
