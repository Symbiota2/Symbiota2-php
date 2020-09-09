import { Component, OnInit } from "@angular/core";
import { ActivatedRoute, Params, Router } from "@angular/router";

import { QueryParserService } from "../../services/query-parser.service";
import { OccurrenceService } from "occurrence";

const TaxonSearchOpts = [
    { name: "Scientific name", value: OccurrenceService.Q_PARAM_SPECIES },
    { name: "Genus", value: OccurrenceService.Q_PARAM_GENUS },
    { name: "Tribe", value: OccurrenceService.Q_PARAM_TRIBE },
    { name: "Family", value: OccurrenceService.Q_PARAM_FAMILY },
    { name: "Order", value: OccurrenceService.Q_PARAM_ORDER },
    { name: "Class", value: OccurrenceService.Q_PARAM_CLASS },
    { name: "Phylum", value: OccurrenceService.Q_PARAM_PHYLUM },
    { name: "Kingdom", value: OccurrenceService.Q_PARAM_KINGDOM }
];

@Component({
    selector: "occurrence-search-search-criteria",
    templateUrl: "./search-criteria.component.html",
    styleUrls: ["./search-criteria.component.less"],
})
export class SearchCriteriaComponent implements OnInit {
    private static readonly NEXT_PAGE = "../results";
    private static readonly PREV_PAGE = "..";

    public readonly TaxonSearchOpts = TaxonSearchOpts;

    public collectionIDs: number[] = [];
    public catalogNumber: string = "";
    public taxonSearchType: string = "";
    public taxonSearchStr: string = "";
    public locality: string = "";
    public province: string = "";
    public country: string = "";
    public collector: string = "";
    public collectionDateStart: Date = null;
    public collectionDateEnd: Date = null;

    constructor(
        private router: Router,
        private currentRoute: ActivatedRoute,
        private queryParams: QueryParserService) { }

    ngOnInit() {
        this.collectionIDs = this.queryParams.getCollectionIDs();

        if (this.collectionIDs.length === 0) {
            return this.back();
        }

        this.catalogNumber = this.queryParams.getCatalogNumber();
        this.taxonSearchType = this.queryParams.getTaxonSearchType();
        this.taxonSearchStr = this.queryParams.getTaxonSearchStr();
        this.locality = this.queryParams.getLocality();
        this.province = this.queryParams.getProvince();
        this.country = this.queryParams.getCountry();
        this.collector = this.queryParams.getCollector();
        this.collectionDateStart = this.queryParams.getCollectedAfter();
        this.collectionDateEnd = this.queryParams.getCollectedBefore();
    }

    private getQueryParams(): Params {
        return this.queryParams.getFrontendQueryBuilder()
            .setCollectionIDs(this.collectionIDs)
            .setCatalogNumber(this.catalogNumber)
            .setTaxonSearch(this.taxonSearchType, this.taxonSearchStr)
            .setLocality(this.locality)
            .setProvince(this.province)
            .setCountry(this.country)
            .setCollector(this.collector)
            .setCollectedAfter(this.collectionDateStart)
            .setCollectedBefore(this.collectionDateEnd)
            .build();
    }

    async search() {
        await this.router.navigate(
            [SearchCriteriaComponent.NEXT_PAGE],
            {
                relativeTo: this.currentRoute,
                queryParams: this.getQueryParams()
            }
        );
    }

    async back() {
        const queryParams = {
            [OccurrenceService.Q_PARAM_COLLIDS]: this.collectionIDs
        };

        await this.router.navigate(
            [SearchCriteriaComponent.PREV_PAGE],
            {
                relativeTo: this.currentRoute,
                queryParams
            }
        );
    }
}
