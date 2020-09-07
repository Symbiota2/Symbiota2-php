import { Component, OnInit } from "@angular/core";
import {ActivatedRoute, Router} from "@angular/router";
import {FormControl, FormGroup} from "@angular/forms";
import {SearchCollectionsComponent} from "../search-collections/search-collections.component";

import { QueryParserService } from "../../services/query-parser.service";
import { OccurrenceService } from "occurrence";

const TaxonSearchOpts = [
    { name: "Species", value: "scientificName" },
    { name: "Kingdom", value: "kingdom" },
    { name: "Phylum", value: "phylum" },
    { name: "Class", value: "class" },
    { name: "Order", value: "order" },
    { name: "Family", value: "family" },
    { name: "Tribe", value: "tribe" },
    { name: "Genus", value: "genus" }
];

@Component({
    selector: "occurrence-search-search-criteria",
    templateUrl: "./search-criteria.component.html",
    styleUrls: ["./search-criteria.component.less"],
})
export class SearchCriteriaComponent implements OnInit {
    private static readonly NEXT_PAGE = "../results";
    private static readonly PREV_PAGE = "..";

    public readonly FORM_KEY_CAT_NUM = OccurrenceService.Q_PARAM_CAT_NUM;
    public readonly FORM_KEY_TAXON_TYPE = QueryParserService.Q_PARAM_TAXON_TYPE;
    public readonly FORM_KEY_TAXON_SEARCH = QueryParserService.Q_PARAM_TAXON_SEARCH;

    public readonly TaxonSearchOpts = TaxonSearchOpts;

    public formGroup = new FormGroup({
        [this.FORM_KEY_CAT_NUM]: new FormControl(""),
        [this.FORM_KEY_TAXON_TYPE]: new FormControl(""),
        [this.FORM_KEY_TAXON_SEARCH]: new FormControl("")
    });

    public collectionIDs: number[] = [];

    constructor(
        private router: Router,
        private currentRoute: ActivatedRoute,
        private queryParser: QueryParserService) {}

    ngOnInit() {
        this.collectionIDs = this.queryParser.getCollectionIDs();
        this.formGroup.patchValue({
            [this.FORM_KEY_CAT_NUM]: this.queryParser.getCatalogNumber(),
            [this.FORM_KEY_TAXON_TYPE]: this.queryParser.getTaxonSearchType(),
            [this.FORM_KEY_TAXON_SEARCH]: this.queryParser.getTaxonSearchStr(),
        });

        if (this.collectionIDs.length === 0) {
            this.back();
        }
    }

    private getQueryParams() {
        const qParams = {
            [OccurrenceService.Q_PARAM_COLLIDS]: this.collectionIDs
        };

        const catNum = this.formGroup.get(this.FORM_KEY_CAT_NUM).value;
        const taxonType = this.formGroup.get(this.FORM_KEY_TAXON_TYPE).value;
        const taxonStr = this.formGroup.get(this.FORM_KEY_TAXON_SEARCH).value;

        qParams[OccurrenceService.Q_PARAM_CAT_NUM] = (
            catNum === "" ? null : catNum
        );

        if (taxonType !== "" && taxonStr !== "") {
            qParams[QueryParserService.Q_PARAM_TAXON_TYPE] = taxonType;
            qParams[QueryParserService.Q_PARAM_TAXON_SEARCH] = taxonStr;
        }
        else {
            qParams[QueryParserService.Q_PARAM_TAXON_TYPE] = null;
            qParams[QueryParserService.Q_PARAM_TAXON_SEARCH] = null;
        }

        return qParams;
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
