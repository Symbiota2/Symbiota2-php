import { Component, OnInit } from "@angular/core";

enum Page {
    PAGE_COLLECTION_SELECT,
    PAGE_SEARCH_CRITERIA,
    PAGE_SEARCH_RESULTS,
}

@Component({
    selector: "occurrence-search-search-criteria",
    templateUrl: "./search-criteria.component.html",
    styleUrls: ["./search-criteria.component.less"],
})
export class SearchCriteriaComponent implements OnInit {
    public Page = Page;
    public currentPage: number = Page.PAGE_COLLECTION_SELECT;

    ngOnInit() {

    }

    onSwitchPage(direction: number) {
        const newPage = this.currentPage + direction;
        if (newPage in Page) {
            this.currentPage = newPage;
        }
    }
}
