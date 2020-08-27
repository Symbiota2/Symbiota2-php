export interface OccurrenceSearchParams {
    "collection.id"?: number | number[],
    catalogNumber?: string,
    scientificName?: string
    family?: string,
    higherTaxon?: string
    page?: number
}
