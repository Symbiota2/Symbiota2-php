import {Component, OnInit} from "@angular/core";
import {
    OccurrenceSearchResult,
    OccurrenceSearchResults,
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
    public currentPage = 1;
    public totalResults = 0;
    public itemsPerPage = OccurrenceService.DEFAULT_ITEMS_PER_PAGE;
    public occurrences: OccurrenceSearchResult[] = [];

    private collectionIDs: number[] = [];
    private catalogNumber: string = "";
    private taxonSearchType: string = "";
    private taxonSearchStr: string = "";
    private locality: string = "";
    private province: string = "";
    private country: string = "";
    private collector: string = "";

    constructor(
        private router: Router,
        private currentRoute: ActivatedRoute,
        private queryParams: QueryParserService,
        private occurrenceService: OccurrenceService) { }

    ngOnInit() {
        this.collectionIDs = this.queryParams.getCollectionIDs();

        if (this.collectionIDs.length > 0) {
            this.catalogNumber = this.queryParams.getCatalogNumber();
            this.taxonSearchType = this.queryParams.getTaxonSearchType();
            this.taxonSearchStr = this.queryParams.getTaxonSearchStr();
            this.locality = this.queryParams.getLocality();
            this.province = this.queryParams.getProvince();
            this.country = this.queryParams.getCountry();
            this.collector = this.queryParams.getCollector();

            this.loadOccurrences();
        }
        else {
            this.backToCollections();
        }
    }

    loadOccurrences() {
        this.isLoading = true;
        this.occurrenceService.getOccurrences(this.getApiQueryParams())
            .subscribe((searchResults: OccurrenceSearchResults) => {
                this.totalResults = searchResults.totalResults;
                this.occurrences = searchResults.occurrences;
                this.isLoading = false;
            });
    }

    getCriteriaQueryParams(): Params {
        return this.queryParams.getFrontendQueryBuilder()
            .setCollectionIDs(this.collectionIDs)
            .setCatalogNumber(this.catalogNumber)
            .setTaxonSearch(this.taxonSearchType, this.taxonSearchStr)
            .setLocality(this.locality)
            .setProvince(this.province)
            .setCountry(this.country)
            .setCollector(this.collector)
            .build();
    }

    getApiQueryParams(): Params {
        return this.queryParams.getApiQueryBuilder()
            .setCollectionIDs(this.collectionIDs)
            .setCatalogNumber(this.catalogNumber)
            .setTaxonSearch(this.taxonSearchType, this.taxonSearchStr)
            .setLocality(this.locality)
            .setProvince(this.province)
            .setCountry(this.country)
            .setCollector(this.collector)
            .setPage(this.currentPage)
            .setItemsPerPage(this.itemsPerPage)
            .build();
    }

    onItemsPerPageChanged(itemsPerPage: string) {
        this.itemsPerPage = parseInt(itemsPerPage);
        this.loadOccurrences();
    }

    getFirstIndexOnPage() {
        if (this.totalResults === 0) {
            return 0;
        }
        return this.itemsPerPage * (this.currentPage - 1) + 1;
    }

    getLastIndexOnPage() {
        const lastIdx = this.getFirstIndexOnPage() + this.itemsPerPage - 1;
        if (lastIdx > this.totalResults) {
            return this.totalResults;
        }
        return lastIdx;
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
