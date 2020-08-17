import { Component, OnInit } from "@angular/core";
import { FormControl, FormGroup } from "@angular/forms";
import { ActivatedRoute, Router } from "@angular/router";

enum Page {
    PAGE_COLLECTION_SELECT,
    PAGE_SEARCH_CRITERIA,
    PAGE_SEARCH_RESULTS,
}

@Component({
    selector: "occurrence-search-search-criteria",
    templateUrl: "./search-criteria.component.html",
    styleUrls: ["../../occurrence-search.less", "./search-criteria.component.less"],
})
export class SearchCriteriaComponent implements OnInit {
    public Page = Page;

    public Q_PARAM_COLLIDS = "collectionID";

    public FORM_GROUP_TAXON = "taxon";
    public Q_PARAM_TAXON_SEARCH_TYPE = "searchType";
    public Q_PARAM_TAXON_SEARCH_STR = "searchStr";

    public currentPage = Page.PAGE_COLLECTION_SELECT;

    public searchParams = new FormGroup({
        [this.Q_PARAM_COLLIDS]: new FormControl([]),
        [this.FORM_GROUP_TAXON]: new FormGroup({
            [this.Q_PARAM_TAXON_SEARCH_TYPE]: new FormControl(""),
            [this.Q_PARAM_TAXON_SEARCH_STR]: new FormControl("")
        })
    });

    constructor(private router: Router, private currentRoute: ActivatedRoute) {}

    ngOnInit() {
        this.searchParams.valueChanges.subscribe(() => {
            console.log(this.searchParams.value);
        });
    }

    async onSwitchPage(direction: number) {
        const newPage = this.currentPage + direction;
        if (newPage in Page) {
            this.currentPage = newPage;
        }
    }
}
