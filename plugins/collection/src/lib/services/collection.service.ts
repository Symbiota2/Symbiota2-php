import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';

import {CollectionListItem} from '../interfaces/collection.interface';

@Injectable({
    providedIn: 'root',
})
export class CollectionService {

    constructor(
        private http: HttpClient
    ) {}

    getCollectionList() {
        this.http.get<any>('/api/collections').subscribe(
            (collectionsList: CollectionListItem[]) => {
                return collectionsList['hydra:member'];
            },
            () => {}
        );
    }
}
