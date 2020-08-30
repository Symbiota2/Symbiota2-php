export const FORM_KEY_COLLIDS = "collectionID";
export const FORM_KEY_TAXON_TYPE = "taxonSearchType";
export const FORM_KEY_TAXON_SEARCH = "taxonSearchStr";
export const FORM_KEY_CAT_NUM = "catalogNumber";

export enum TaxonSearchType {
    TYPE_FAM_OR_SCINAME,
    TYPE_FAM_ONLY,
    TYPE_SCINAME_ONLY,
    TYPE_HIGHER_TAXON,
    TYPE_COMMON_NAME
}

export interface TaxonSearchCriteria {
    searchType: TaxonSearchType,
    searchStr: string
}

