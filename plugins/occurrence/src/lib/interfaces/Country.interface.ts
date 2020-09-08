export interface Country {
    id: number;
    countryName: string;
    iso: string;
    iso3: string;
    numericCode: number;
    initialTimestamp: string;
}

export interface CountrySearchResult {
    id: number;
    name: string;
}
