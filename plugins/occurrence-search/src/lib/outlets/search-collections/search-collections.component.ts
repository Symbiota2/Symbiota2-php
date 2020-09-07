import { Component, OnInit } from "@angular/core";
import { ActivatedRoute, Router } from "@angular/router";
import {OccurrenceService} from "occurrence";
import {QueryParserService} from "../../services/query-parser.service";

@Component({
    selector: "occurrence-search-search-collections",
    templateUrl: "./search-collections.component.html",
    styleUrls: ["./search-collections.component.less"],
})
export class SearchCollectionsComponent implements OnInit {
    private static readonly NEXT_PAGE = "./criteria";

    public collectionIDs: number[] = [];

    constructor(
        private router: Router,
        private currentRoute: ActivatedRoute,
        private queryParams: QueryParserService) { }

    ngOnInit() {
        this.collectionIDs = this.queryParams.getCollectionIDs();
    }

    onCollectionIDsChanged(collectionIDs: number[]) {
        this.collectionIDs = collectionIDs;
    }

    async onNext() {
        const collIDs = (
            this.collectionIDs.length > 0 ? this.collectionIDs : null
        );

        await this.router.navigate(
            [SearchCollectionsComponent.NEXT_PAGE],
            {
                relativeTo: this.currentRoute,
                queryParams: {
                    [OccurrenceService.Q_PARAM_COLLIDS]: collIDs
                }
            }
        );
    }
}
