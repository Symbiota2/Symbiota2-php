export interface Locality {
    id: number;
    municipalityName: string;
    initialTimestamp: string;
    stateProvince: string;
}

export interface LocalitySearchResult {
    id: number;
    name: string;
    provinceID: number;
}
