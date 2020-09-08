export interface Province {
    id: number;
    stateName: string;
    abbreviation: string;
    initialTimestamp: string;
    country: string;
}

export interface ProvinceSearchResult {
    id: number;
    name: string;
    countryID: number;
}
