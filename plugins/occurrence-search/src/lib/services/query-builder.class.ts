import {OccurrenceService} from "occurrence";
import {Params} from "@angular/router";

abstract class QueryBuilder {
    protected queryParams: Record<string, any> = {};

    public setCollectionIDs(collectionIDs: number[]) {
        if (collectionIDs.length > 0) {
            this.queryParams[OccurrenceService.Q_PARAM_COLLIDS] = collectionIDs;
        }
        return this;
    }

    public setCatalogNumber(catalogNumber: string) {
        this.setStringValue(
            OccurrenceService.Q_PARAM_CAT_NUM,
            catalogNumber
        );
        return this;
    }

    public setLocality(locality: string) {
        this.setStringValue(
            OccurrenceService.Q_PARAM_LOCALITY,
            locality
        );
        return this;
    }

    public setProvince(province: string) {
        this.setStringValue(
            OccurrenceService.Q_PARAM_STATE,
            province
        );
        return this;
    }

    public setCountry(country: string) {
        this.setStringValue(
            OccurrenceService.Q_PARAM_COUNTRY,
            country
        );
        return this;
    }

    public setCollector(collector: string) {
        this.setStringValue(
            OccurrenceService.Q_PARAM_COLLECTOR,
            collector
        );
        return this;
    }

    public build(): Params {
        return this.queryParams;
    }

    protected setStringValue(key: string, value: string) {
        if (value !== "") {
            this.queryParams[key] = value;
        }
    }

    abstract setTaxonSearch(searchType: string, searchStr);
}

export class ApiQueryBuilder extends QueryBuilder {

    public setTaxonSearch(searchType: string, searchStr): ApiQueryBuilder {
        if (OccurrenceService.VALID_TAXON_TYPES.includes(searchType) && searchStr !== "") {
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

    public setItemsPerPage(itemsPerPage: number): ApiQueryBuilder {
        if (itemsPerPage > 1) {
            this.queryParams[OccurrenceService.Q_PARAM_ITEMS_PER_PAGE] = itemsPerPage;
        }
        return this;
    }
}

export class FrontendQueryBuilder extends QueryBuilder {
    public static readonly Q_PARAM_TAXON_TYPE = "taxonSearchType";
    public static readonly Q_PARAM_TAXON_SEARCH = "taxonSearch";

    public setTaxonSearch(searchType: string, searchStr): FrontendQueryBuilder {
        if (OccurrenceService.VALID_TAXON_TYPES.includes(searchType) || searchType === "") {
            if (searchType !== "" && searchStr !== "") {
                this.queryParams[FrontendQueryBuilder.Q_PARAM_TAXON_TYPE] = searchType;
                this.queryParams[FrontendQueryBuilder.Q_PARAM_TAXON_SEARCH] = searchStr;
            }
        }
        return this;
    }
}
