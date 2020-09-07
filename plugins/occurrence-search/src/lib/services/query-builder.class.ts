import {OccurrenceService, TaxonSearchTypes} from "occurrence";
import {Params} from "@angular/router";
import {QueryParserService} from "./query-parser.service";

abstract class QueryBuilder {
    protected queryParams: Record<string, any> = {};

    public setCollectionIDs(collectionIDs: number[]) {
        if (collectionIDs.length > 0) {
            this.queryParams[OccurrenceService.Q_PARAM_COLLIDS] = collectionIDs;
        }
        return this;
    }

    public setCatalogNumber(catalogNumber: string) {
        if (catalogNumber !== "") {
            this.queryParams[OccurrenceService.Q_PARAM_CAT_NUM] = catalogNumber;
        }
        return this;
    }

    public build(): Params {
        return this.queryParams;
    }

    abstract setTaxonSearch(searchType: string, searchStr);
}

export class ApiQueryBuilder extends QueryBuilder {

    public setTaxonSearch(searchType: string, searchStr): ApiQueryBuilder {
        if (TaxonSearchTypes.includes(searchType) && searchStr !== "") {
            this.queryParams[searchType] = searchStr;
        }
        return this;
    }

    public setPage(page: number): ApiQueryBuilder {
        // First page is 1 w/ ApiPlatform
        if (page > 0) {
            this.queryParams[OccurrenceService.Q_PARAM_RESULT_PAGE] = page;
        }
        return this;
    }
}

export class FrontendQueryBuilder extends QueryBuilder {
    public setTaxonSearch(searchType: string, searchStr): FrontendQueryBuilder {
        if (TaxonSearchTypes.includes(searchType) || searchType === "") {
            if (searchType !== "" && searchStr !== "") {
                this.queryParams[QueryParserService.Q_PARAM_TAXON_TYPE] = searchType;
                this.queryParams[QueryParserService.Q_PARAM_TAXON_SEARCH] = searchStr;
            }
        }
        return this;
    }
}
