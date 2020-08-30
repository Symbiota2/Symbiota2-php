import { Component, OnInit } from "@angular/core";
import { FormBuilder, FormGroup } from "@angular/forms";
import { ActivatedRoute, Router } from "@angular/router";
import {
    FORM_KEY_COLLIDS,
    FORM_KEY_TAXON_TYPE,
    FORM_KEY_TAXON_SEARCH,
    FORM_KEY_CAT_NUM
} from "../../shared";
import {OccurrenceSearchParams} from "occurrence";

enum Page {
    PAGE_COLLECTION_SELECT,
    PAGE_SEARCH_CRITERIA
}

@Component({
    selector: "occurrence-search-search-criteria",
    templateUrl: "./search-criteria.component.html",
    styleUrls: ["../../occurrence-search.less", "./search-criteria.component.less"],
})
export class SearchCriteriaComponent implements OnInit {
    public Page = Page;

    public Q_PARAM_PAGE = "page";

    public currentPage: Page = Page.PAGE_COLLECTION_SELECT;
    public searchParams: FormGroup;

    public FORM_KEY_COLLIDS = FORM_KEY_COLLIDS;

    constructor(
        private formBuilder: FormBuilder,
        private router: Router,
        private currentRoute: ActivatedRoute
    ) {}

    ngOnInit() {
        this.searchParams = this.formBuilder.group({
            [FORM_KEY_COLLIDS]: [],
            [FORM_KEY_TAXON_TYPE]: "",
            [FORM_KEY_TAXON_SEARCH]: "",
            [FORM_KEY_CAT_NUM]: ""
        });
    }

    async onSwitchPage(direction: number) {
        const newPage = this.currentPage + direction;
        if (newPage in Page) {
            this.currentPage = newPage;
        }
    }

    async onSearch() {
        let taxonSearchType = this.searchParams.get(FORM_KEY_TAXON_TYPE).value;
        let taxonSearchText = this.searchParams.get(FORM_KEY_TAXON_SEARCH).value;
        let collIDs = this.searchParams.get(FORM_KEY_COLLIDS).value;
        let catalogNumber = this.searchParams.get(FORM_KEY_CAT_NUM).value;

        if (taxonSearchType === "" || taxonSearchText === "") {
            taxonSearchType = null;
            taxonSearchText = null;
        }

        if (collIDs.length === 0) {
            collIDs = null;
        }

        if (catalogNumber === "") {
            catalogNumber = null;
        }

        const queryParams: OccurrenceSearchParams = {
            "collection.id": collIDs,
            [taxonSearchType]: taxonSearchText,
            [FORM_KEY_CAT_NUM]: catalogNumber
        };

        return this.router.navigate(
            ["results"],
            {
                queryParams,
                relativeTo: this.currentRoute
            }
        );
    }
}
