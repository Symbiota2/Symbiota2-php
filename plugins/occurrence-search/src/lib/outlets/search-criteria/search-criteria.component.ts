import { Component, OnInit } from "@angular/core";
import {ActivatedRoute, Router} from "@angular/router";
import {FormControl, FormGroup} from "@angular/forms";
import {SearchCollectionsComponent} from "../search-collections/search-collections.component";

import {
    FORM_KEY_CAT_NUM,
    FORM_KEY_TAXON_SEARCH,
    FORM_KEY_TAXON_TYPE,
    Q_PARAM_CAT_NUM,
    Q_PARAM_COLLIDS, Q_PARAM_TAXON_SEARCH, Q_PARAM_TAXON_TYPE
} from "../../include";

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

    public readonly FORM_KEY_CAT_NUM = FORM_KEY_CAT_NUM;
    public readonly FORM_KEY_TAXON_TYPE = FORM_KEY_TAXON_TYPE;
    public readonly FORM_KEY_TAXON_SEARCH = FORM_KEY_TAXON_SEARCH;

    public readonly TaxonSearchOpts = TaxonSearchOpts;

    public formGroup = new FormGroup({
        [this.FORM_KEY_CAT_NUM]: new FormControl(""),
        [this.FORM_KEY_TAXON_TYPE]: new FormControl(""),
        [this.FORM_KEY_TAXON_SEARCH]: new FormControl("")
    });

    public collectionIDs: number[] = [];

    constructor(
        private router: Router,
        private currentRoute: ActivatedRoute) {}

    ngOnInit() {
        const currentParams = this.currentRoute.snapshot.queryParamMap;

        if (currentParams.has(Q_PARAM_COLLIDS)) {
            this.collectionIDs = currentParams
                .getAll(Q_PARAM_COLLIDS)
                .map((collID) => parseInt(collID));
        }

        if (currentParams.has(Q_PARAM_CAT_NUM)) {
            this.formGroup.patchValue({
                [FORM_KEY_CAT_NUM]: currentParams.get(Q_PARAM_CAT_NUM)
            });
        }

        if (currentParams.has(Q_PARAM_TAXON_TYPE) &&
            currentParams.has(Q_PARAM_TAXON_SEARCH)) {
            this.formGroup.patchValue({
                [FORM_KEY_TAXON_TYPE]: currentParams.get(Q_PARAM_TAXON_TYPE),
                [FORM_KEY_TAXON_SEARCH]: currentParams.get(Q_PARAM_TAXON_SEARCH)
            });
        }

        if (this.collectionIDs.length === 0) {
            this.back();
        }
    }

    private getQueryParams() {
        const qParams = {
            [Q_PARAM_COLLIDS]: this.collectionIDs
        };

        const catNum = this.formGroup.get(this.FORM_KEY_CAT_NUM).value;
        const taxonType = this.formGroup.get(this.FORM_KEY_TAXON_TYPE).value;
        const taxonStr = this.formGroup.get(this.FORM_KEY_TAXON_SEARCH).value;

        if (catNum !== "") {
            qParams[Q_PARAM_CAT_NUM] = catNum;
        }

        if (taxonType !== "" && taxonStr !== "") {
            qParams[Q_PARAM_TAXON_TYPE] = taxonType;
            qParams[Q_PARAM_TAXON_SEARCH] = taxonStr;
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
            [SearchCollectionsComponent.Q_PARAM_COLLIDS]: this.collectionIDs
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
