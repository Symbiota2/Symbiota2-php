export interface OccurrenceSearchParams {
    "collection.id[]"?: number | number[],
    page?: number,
    kingdom?: string,
    phylum?: string,
    class?: string,
    order?: string,
    family?: string,
    tribe?: string,
    species?: string,
    catalogNumber?: string
}

// Valid taxon search types
export const TaxonSearchTypes = [
    "kingdom",
    "phylum",
    "class",
    "order",
    "family",
    "tribe",
    "genus",
    "species"
];
