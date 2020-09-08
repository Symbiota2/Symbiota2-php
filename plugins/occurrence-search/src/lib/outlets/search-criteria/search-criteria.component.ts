import { Component, OnInit } from "@angular/core";
import { ActivatedRoute, Params, Router } from "@angular/router";

import { QueryParserService } from "../../services/query-parser.service";
import { CountrySearchResult, OccurrenceService } from "occurrence";
import { ProvinceSearchResult } from "occurrence/lib/interfaces/Province.interface";
import { LocalitySearchResult } from "occurrence/lib/interfaces/Locality.interface";

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

    public countryOpts: CountrySearchResult[] = [];
    public provinceOpts: ProvinceSearchResult[] = [];
    public localityOpts: LocalitySearchResult[] = [];

    public collectionIDs: number[] = [];
    public catalogNumber: string = "";
    public taxonSearchType: string = "";
    public taxonSearchStr: string = "";
    public locality: string = "";
    public province: string = "";
    public country: string = "";
    public collector: string = "";

    constructor(
        private router: Router,
        private currentRoute: ActivatedRoute,
        private queryParser: QueryParserService,
        private occurrenceService: OccurrenceService) { }

    ngOnInit() {
        this.collectionIDs = this.queryParser.getCollectionIDs();

        if (this.collectionIDs.length === 0) {
            return this.back();
        }

        this.occurrenceService.getCountries().subscribe((countries) => {
            this.countryOpts = countries;
        });

        this.catalogNumber = this.queryParser.getCatalogNumber();
        this.taxonSearchType = this.queryParser.getTaxonSearchType();
        this.taxonSearchStr = this.queryParser.getTaxonSearchStr();
        this.locality = this.queryParser.getLocality();
        this.province = this.queryParser.getProvince();
        this.country = this.queryParser.getCountry();
        this.collector = this.queryParser.getCollector();
    }

    private getQueryParams(): Params {
        return this.queryParser.getFrontendQueryBuilder()
            .setCollectionIDs(this.collectionIDs)
            .setCatalogNumber(this.catalogNumber)
            .setTaxonSearch(this.taxonSearchType, this.taxonSearchStr)
            .setLocality(this.locality)
            .setProvince(this.province)
            .setCountry(this.country)
            .setCollector(this.collector)
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
