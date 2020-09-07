import { Injectable } from "@angular/core";
import {HttpClient} from "@angular/common/http";
import { Observable } from "rxjs";
import { OccurrenceModule } from "../occurrence.module";
import { Occurrence } from "../interfaces/Occurrence";
import {OccurrenceSearchParams} from "../interfaces/OccurrenceSearchParams";
import {Collection} from "collection";
import {mergeMap} from "rxjs/operators";

const API_BASE_URL = "/api/occurrences";
const DEFAULT_HEADERS = {
    "accept": "application/json"
};

@Injectable({
    providedIn: OccurrenceModule
})
export class OccurrenceService {
    public static readonly Q_PARAM_COLLIDS = "collection.id[]";
    public static readonly Q_PARAM_RESULT_PAGE = "page";
    public static readonly Q_PARAM_CAT_NUM = "catalogNumber";
    public static readonly Q_PARAM_KINGDOM = "kingdom";
    public static readonly Q_PARAM_PHYLUM = "phylum";
    public static readonly Q_PARAM_CLASS = "class";
    public static readonly Q_PARAM_ORDER = "order";
    public static readonly Q_PARAM_FAMILY = "family";
    public static readonly Q_PARAM_TRIBE = "tribe";
    public static readonly Q_PARAM_GENUS = "genus";
    public static readonly Q_PARAM_SPECIES = "species";

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
        private http: HttpClient) {}

    private httpGet<T>(url: string, options?: object): Observable<T> {
        const opts = Object.assign({ headers: DEFAULT_HEADERS }, options);
        return this.http.get<T>(url, opts);
    }

    getOccurrences(params?: OccurrenceSearchParams): Observable<Occurrence[]> {
        return this.httpGet<Occurrence[]>(API_BASE_URL, { params });
    }

    getOccurrenceByID(id: number): Observable<Occurrence> {
        return this.httpGet<Occurrence>(`${API_BASE_URL}/${id}`);
    }

    getCollectionForOccurrence(id: number): Observable<Collection> {
        return this.getOccurrenceByID(id).pipe(mergeMap((occurrence) => {
            return this.httpGet<Collection>(occurrence.collection);
        }));
    }
}
