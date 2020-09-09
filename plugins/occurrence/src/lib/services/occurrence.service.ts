import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Observable } from "rxjs";
import { OccurrenceModule } from "../occurrence.module";
import { Occurrence } from "../interfaces/Occurrence.interface";
import {
    OccurrenceSearchResult,
    OccurrenceSearchResults
} from "../interfaces/OccurrenceSearchResults.interface";
import { map } from "rxjs/operators";
import { Params } from "@angular/router";
import { CollectionDetails } from "collection";

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
    public static readonly Q_PARAM_DATE_BEFORE = "eventDate[before]";
    public static readonly Q_PARAM_DATE_AFTER = "eventDate[after]";

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

        return this.http.get<Occurrence>(OccurrenceService.OCCURRENCE_BASE_URL, { params })
            .pipe(map((apiResult) => {
                return {
                    totalResults: apiResult["hydra:totalItems"],
                    currentPage: apiResult["hydra:view"]["@id"],
                    nextPage: apiResult["hydra:view"]["hydra:next"],
                    lastPage: apiResult["hydra:view"]["hydra:last"],
                    occurrences: apiResult["hydra:member"].map((occurrence) => {
                        return {
                            id: occurrence.id,
                            recordNumber: occurrence.recordNumber,
                            catalogNumber: occurrence.catalogNumber,
                            collectionUrl: occurrence.collection,
                            taxonUrl: occurrence.taxon,
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
                            eventDate: new Date(occurrence.eventDate),
                            verbatimEventDate: occurrence.verbatimEventDate
                        };
                    })
                };
            }));
    }

    getOccurrenceByID(id: number): Observable<OccurrenceSearchResult> {
        return this.http.get<Occurrence>(`${OccurrenceService.OCCURRENCE_BASE_URL}/${id}`)
            .pipe(map((occurrence) => {
                return {
                    id: occurrence.id,
                    recordNumber: occurrence.recordNumber,
                    catalogNumber: occurrence.catalogNumber,
                    collectionUrl: occurrence.collection,
                    taxonUrl: occurrence.taxon,
                    scientificName: occurrence.scientificName,
                    family: occurrence.family,
                    recordedBy: occurrence.recordedBy,
                    lifeStage: occurrence.lifeStage,
                    preparations: occurrence.preparations,
                    remarks: occurrence.occurrenceRemarks,
                    location: {
                        locality: occurrence.locality,
                        stateProvince: occurrence.stateProvince,
                        country: occurrence.country,
                    },
                    eventDate: new Date(occurrence.eventDate),
                    verbatimEventDate: occurrence.verbatimEventDate
                };
            }));
    }

    getCollectionForOccurrence(occurrenceCollectionUrl: string): Observable<CollectionDetails> {
        return this.http.get<CollectionDetails>(occurrenceCollectionUrl).pipe(map((collection) => {
            return {
                id: collection.id,
                institutionCode: collection.institutionCode,
                collectionCode: collection.collectionCode,
                collectionName: collection.collectionName,
                icon: collection.icon,
                collectionType: collection.collectionType,
                dwcaUrl: collection.dwcaUrl,
                email: collection.email,
                rightsHolder: collection.rightsHolder,
                rights: collection.rights,
                usageTerm: collection.usageTerm
            };
        }));
    }
}
