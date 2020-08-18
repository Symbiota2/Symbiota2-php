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

export interface SearchCriteriaFormValues {
    taxa: TaxonSearchCriteria
}