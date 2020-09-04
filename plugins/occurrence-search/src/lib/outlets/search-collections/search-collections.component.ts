import { Component, OnInit } from "@angular/core";
import { ActivatedRoute, Router } from "@angular/router";

import { Q_PARAM_COLLIDS } from "../../include";

@Component({
    selector: "occurrence-search-search-collections",
    templateUrl: "./search-collections.component.html",
    styleUrls: ["./search-collections.component.less"],
})
export class SearchCollectionsComponent implements OnInit {
    public static readonly Q_PARAM_COLLIDS = Q_PARAM_COLLIDS;
    private static readonly NEXT_PAGE = "./criteria";

    public collectionIDs: number[] = [];

    constructor(
        private router: Router,
        private currentRoute: ActivatedRoute) { }

    ngOnInit() {
        this.currentRoute.queryParamMap.subscribe((queryParams) => {
            if (queryParams.has(SearchCollectionsComponent.Q_PARAM_COLLIDS)) {
                this.collectionIDs = queryParams
                    .getAll(SearchCollectionsComponent.Q_PARAM_COLLIDS)
                    .map(collID => parseInt(collID));
            }
        });
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
                    [SearchCollectionsComponent.Q_PARAM_COLLIDS]: collIDs
                }
            }
        );
    }
}
