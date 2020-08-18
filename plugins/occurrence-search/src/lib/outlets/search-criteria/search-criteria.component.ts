import { Component, OnInit } from "@angular/core";
import { FormControl, FormGroup } from "@angular/forms";
import { ActivatedRoute, ParamMap, Router } from "@angular/router";

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

    public Q_PARAM_PAGE = "page";
    public Q_PARAM_COLLIDS = "collectionID";
    public Q_PARAM_SEARCH_OPTS = "searchParams";

    public currentPage: Page = Page.PAGE_COLLECTION_SELECT;

    public searchParams = new FormGroup({
        [this.Q_PARAM_COLLIDS]: new FormControl([]),
        [this.Q_PARAM_SEARCH_OPTS]: new FormControl({
            taxa: {
                searchType: null,
                searchStr: ""
            }
        })
    });

    constructor(
        private router: Router,
        private currentRoute: ActivatedRoute
    ) {}

    ngOnInit() {
        this.currentRoute.queryParamMap.subscribe(this.onPageChanged.bind(this));

        this.searchParams.valueChanges.subscribe(() => {
            console.log(this.searchParams.value);
        });
    }

    onPageChanged(params: ParamMap) {
        this.currentPage = Page.PAGE_COLLECTION_SELECT;

        if (params.has(this.Q_PARAM_PAGE)) {
            try {
                const newPage = parseInt(params.get(this.Q_PARAM_PAGE));

                if (newPage in Page) {
                    this.currentPage = newPage;
                }
            } catch (e) {
                console.error(`Invalid page provided: ${e.message}`);
            }
        }
    }

    async onSwitchPage(direction: number) {
        const newPage = this.currentPage + direction;
        if (newPage in Page) {
            await this.router.navigate(
                [],
                { queryParams: { [this.Q_PARAM_PAGE]: newPage } }
            );
        }
    }

    async onSearch() {


        this.onSwitchPage(1);
    }
}
