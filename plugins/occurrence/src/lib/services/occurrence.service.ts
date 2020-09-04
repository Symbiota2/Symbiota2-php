import { Injectable } from "@angular/core";
import {HttpClient, HttpParams} from "@angular/common/http";
import { Observable } from "rxjs";
import { OccurrenceModule } from "../occurrence.module";
import { Occurrence } from "../interfaces/Occurrence";
import {OccurrenceSearchParams} from "../interfaces/OccurrenceSearchParams";
import {CollectionService, Collection} from "collection";
import {flatMap, mergeMap} from "rxjs/operators";

const API_BASE_URL = "/api/occurrences";
const DEFAULT_HEADERS = {
    "accept": "application/json"
};

@Injectable({
    providedIn: OccurrenceModule
})
export class OccurrenceService {

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
