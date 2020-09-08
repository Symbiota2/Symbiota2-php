import { Injectable } from "@angular/core";
import {ActivatedRoute, ParamMap} from "@angular/router";
import {OccurrenceService} from "occurrence";
import {ApiQueryBuilder, FrontendQueryBuilder} from "./query-builder.class";


@Injectable()
export class QueryParserService {
    public static readonly Q_PARAM_TAXON_TYPE = FrontendQueryBuilder.Q_PARAM_TAXON_TYPE;
    public static readonly Q_PARAM_TAXON_SEARCH = FrontendQueryBuilder.Q_PARAM_TAXON_SEARCH;

    private _queryParams: ParamMap;

    constructor(private currentRoute: ActivatedRoute) {
        this.currentRoute.queryParamMap.subscribe((paramMap) => {
            this._queryParams = paramMap;
        });
    }

    private get queryParams() {
        return this._queryParams;
    }

    public getCollectionIDs(): number[] {
        if (this.queryParams.has(OccurrenceService.Q_PARAM_COLLIDS)) {
            return this.queryParams.getAll(OccurrenceService.Q_PARAM_COLLIDS)
                .map((collID) => parseInt(collID));
        }

        return [];
    }

    public getCatalogNumber(): string {
        if (this.queryParams.has(OccurrenceService.Q_PARAM_CAT_NUM)) {
            return this.queryParams.get(OccurrenceService.Q_PARAM_CAT_NUM);
        }

        return "";
    }

    public getTaxonSearchType(): string {
        if (this.queryParams.has(QueryParserService.Q_PARAM_TAXON_TYPE)) {
            const searchType = this.queryParams.get(
                QueryParserService.Q_PARAM_TAXON_TYPE
            );

            // Only return a valid taxon search type
            if (OccurrenceService.VALID_TAXON_TYPES.includes(searchType)) {
                return searchType;
            }
        }

        return "";
    }

    public getTaxonSearchStr(): string {
        if (this.queryParams.has(QueryParserService.Q_PARAM_TAXON_SEARCH)) {
            return this.queryParams.get(QueryParserService.Q_PARAM_TAXON_SEARCH);
        }

        return "";
    }

    public getLocality(): string {
        if (this.queryParams.has(OccurrenceService.Q_PARAM_LOCALITY)) {
            return this.queryParams.get(OccurrenceService.Q_PARAM_LOCALITY);
        }

        return "";
    }

    public getProvince(): string {
        if (this.queryParams.has(OccurrenceService.Q_PARAM_STATE)) {
            return this.queryParams.get(OccurrenceService.Q_PARAM_STATE);
        }

        return "";
    }

    public getCountry(): string {
        if (this.queryParams.has(OccurrenceService.Q_PARAM_COUNTRY)) {
            return this.queryParams.get(OccurrenceService.Q_PARAM_COUNTRY);
        }

        return "";
    }

    public getCollector(): string {
        if (this.queryParams.has(OccurrenceService.Q_PARAM_COLLECTOR)) {
            return this.queryParams.get(OccurrenceService.Q_PARAM_COLLECTOR);
        }

        return "";
    }

    public getApiQueryBuilder(): ApiQueryBuilder {
        return new ApiQueryBuilder();
    }

    public getFrontendQueryBuilder(): FrontendQueryBuilder {
        return new FrontendQueryBuilder();
    }
}
