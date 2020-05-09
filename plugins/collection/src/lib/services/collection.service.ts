import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';

import {CollectionListItem} from '../interfaces/collection.interface';
import {BehaviorSubject, Observable} from 'rxjs';

@Injectable({
    providedIn: 'root',
})
export class CollectionService {
    private collectionListSubject = new BehaviorSubject<CollectionListItem[]>([]);
    public readonly collectionList: Observable<CollectionListItem[]> = this.collectionListSubject.asObservable();

    constructor(
        private http: HttpClient
    ) {
        this.setCollectionList();
    }

    setCollectionList() {
        this.http.get<any>('/api/collections').subscribe(
            (collectionList: CollectionListItem[]) => {
                this.collectionListSubject.next(collectionList['hydra:member']);
            },
            () => {}
        );
    }
}
