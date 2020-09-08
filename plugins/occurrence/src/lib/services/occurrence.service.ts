import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Observable } from "rxjs";
import { OccurrenceModule } from "../occurrence.module";
import { Occurrence } from "../interfaces/Occurrence.interface";
import { OccurrenceSearchResults } from "../interfaces/OccurrenceSearchResults.interface";
import { map } from "rxjs/operators";
import { Params } from "@angular/router";
import { Country, CountrySearchResult } from "../interfaces/Country.interface";
import {
    Province,
    ProvinceSearchResult
} from "../interfaces/Province.interface";
import {
    Locality,
    LocalitySearchResult
} from "../interfaces/Locality.interface";

@Injectable({
    providedIn: OccurrenceModule
})
export class OccurrenceService {
    private static readonly OCCURRENCE_BASE_URL = "/api/occurrences";
    private static readonly COUNTRY_BASE_URL = "/api/occurrence/lookupcountries?order[countryName]";
    private static readonly PROVINCE_BASE_URL = "/api/occurrence/lookupstateprovinces?order[stateName]";
    private static readonly MUNICIPALITY_BASE_URL = "/api/occurrence/lookupmunicipalities?order[municipalityName]";

    public static readonly DEFAULT_ITEMS_PER_PAGE = 25;
    private static readonly MAX_ITEMS_PER_PAGE = 100;

    public static readonly Q_PARAM_ITEMS_PER_PAGE = "itemsPerPage";
    public static readonly Q_PARAM_COLLIDS = "collection.id[]";
    public static readonly Q_PARAM_RESULT_PAGE = "page";
    public static readonly Q_PARAM_CAT_NUM = "catalogNumber";
    public static readonly Q_PARAM_COLLECTOR = "recordedBy";

    public static readonly Q_PARAM_LOCALITY = "locality";
    public static readonly Q_PARAM_STATE = "stateProvince";
    public static readonly Q_PARAM_COUNTRY = "country";

    public static readonly Q_PARAM_KINGDOM = "kingdom";
    public static readonly Q_PARAM_PHYLUM = "phylum";
    public static readonly Q_PARAM_CLASS = "class";
    public static readonly Q_PARAM_ORDER = "taxonOrder";
    public static readonly Q_PARAM_FAMILY = "family";
    public static readonly Q_PARAM_TRIBE = "tribe";
    public static readonly Q_PARAM_GENUS = "genus";
    public static readonly Q_PARAM_SPECIES = "scientificName";

    private static Q_PARAM_COUNTRY_ID = "country.id";
    private static Q_PARAM_PROVINCE_ID = "stateProvince.id";

    public static readonly VALID_TAXON_TYPES = [
        OccurrenceService.Q_PARAM_KINGDOM,
        OccurrenceService.Q_PARAM_PHYLUM,
        OccurrenceService.Q_PARAM_CLASS,
        OccurrenceService.Q_PARAM_ORDER,
        OccurrenceService.Q_PARAM_FAMILY,
        OccurrenceService.Q_PARAM_TRIBE,
        OccurrenceService.Q_PARAM_GENUS,
        OccurrenceService.Q_PARAM_SPECIES,
    ];

    constructor(
        private http: HttpClient) {
    }

    getOccurrences(params?: Params): Observable<OccurrenceSearchResults> {
        // Constrain items per page
        if (OccurrenceService.Q_PARAM_ITEMS_PER_PAGE in params) {
            const itemsPerPage = params[OccurrenceService.Q_PARAM_ITEMS_PER_PAGE];
            if (itemsPerPage > OccurrenceService.MAX_ITEMS_PER_PAGE) {
                params[OccurrenceService.Q_PARAM_ITEMS_PER_PAGE] = OccurrenceService.MAX_ITEMS_PER_PAGE;
            }
        }

        return this.http.get<Record<string, any>>(OccurrenceService.OCCURRENCE_BASE_URL, { params })
            .pipe(map((apiResult) => {
                return {
                    totalResults: apiResult["hydra:totalItems"],
                    currentPage: apiResult["hydra:view"]["@id"],
                    nextPage: apiResult["hydra:view"]["hydra:next"],
                    lastPage: apiResult["hydra:view"]["hydra:last"],
                    occurrences: apiResult["hydra:member"].map((occurrence: Occurrence) => {
                        return {
                            id: occurrence.id,
                            recordNumber: occurrence.recordNumber,
                            catalogNumber: occurrence.catalogNumber,
                            collectionUrl: occurrence.collectionId,
                            taxonUrl: occurrence.taxaId,
                            scientificName: occurrence.scientificName,
                            recordedBy: occurrence.recordedBy,
                            lifeStage: occurrence.lifeStage,
                            preparations: occurrence.preparations,
                            remarks: occurrence.occurrenceRemarks,
                            location: {
                                locality: occurrence.locality,
                                stateProvince: occurrence.stateProvince,
                                country: occurrence.country,
                            },
                            eventDate: new Date(occurrence.eventDate)
                        };
                    })
                };
            }));
    }

    getCountries(): Observable<CountrySearchResult[]> {
        return this.http.get<Record<string, any>>(OccurrenceService.COUNTRY_BASE_URL)
            .pipe(map((apiResult) => {
                return apiResult["hydra:member"].map((country: Country) => {
                    return {
                        id: country.id,
                        name: country.countryName
                    };
                });
            }));
    }

    getProvincesForCountry(countryID: number): Observable<ProvinceSearchResult[]> {
        const params = {
            [OccurrenceService.Q_PARAM_COUNTRY_ID]: countryID.toString()
        };

        return this.http.get<Record<string, any>>(
            OccurrenceService.PROVINCE_BASE_URL,
            { params }
        ).pipe(map((apiResult) => {
            return apiResult["hydra:member"].map((province: Province) => {
                return {
                    id: province.id,
                    name: province.stateName,
                    countryID: countryID
                };
            });
        }));
    }

    getMunicipalitiesForProvince(provinceID: number): Observable<LocalitySearchResult[]> {
        const params = {
            [OccurrenceService.Q_PARAM_PROVINCE_ID]: provinceID.toString()
        };

        return this.http.get<Record<string, any>>(
            OccurrenceService.MUNICIPALITY_BASE_URL,
            { params }
        ).pipe(map((apiResult) => {
            return apiResult["hydra:member"].map((locality: Locality) => {
                return {
                    id: locality.id,
                    name: locality.municipalityName,
                    countryID: provinceID
                };
            });
        }));
    }

    getOccurrenceByID(id: number): Observable<Occurrence> {
        return this.http.get<Occurrence>(`${OccurrenceService.OCCURRENCE_BASE_URL}/${id}`);
    }
}
