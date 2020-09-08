export interface OccurrenceSearchResult {
    id: number;
    recordNumber: string;
    catalogNumber: string;
    collectionUrl: string;
    taxonUrl: string;
    scientificName: string;
    recordedBy: string;
    eventDate: Date;
    lifeStage: string;
    preparations: string;
    remarks: string;

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
