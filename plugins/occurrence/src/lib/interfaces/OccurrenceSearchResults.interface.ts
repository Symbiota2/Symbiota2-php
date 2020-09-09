export interface OccurrenceSearchResult {
    id: number;
    catalogNumber: string;
    collectionUrl: string;
    eventDate: Date;
    family: string;
    lifeStage: string;
    preparations: string;
    recordedBy: string;
    recordNumber: string;
    remarks: string;
    scientificName: string;
    taxonUrl: string;
    verbatimEventDate: string;

    location: {
        locality: string;
        stateProvince: string;
        country: string;
    }
}

export interface OccurrenceSearchResults {
    totalResults: number
    currentPage: string
    nextPage: string
    lastPage: string
    occurrences: OccurrenceSearchResult[]
}
