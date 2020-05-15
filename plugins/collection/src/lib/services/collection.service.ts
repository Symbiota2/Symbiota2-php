import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {BehaviorSubject, Observable} from 'rxjs';

import {CollectionListItem} from '../interfaces/collection.interface';
import {Category} from '../interfaces/collection.interface';

@Injectable({
    providedIn: 'root',
})
export class CollectionService {
    private collectionListSubject = new BehaviorSubject<CollectionListItem[]>([]);
    public readonly collectionList: Observable<CollectionListItem[]> = this.collectionListSubject.asObservable();
    private collectionTreeDataSubject = new BehaviorSubject<object>({});
    public readonly collectionTreeData: Observable<object> = this.collectionTreeDataSubject.asObservable();

    constructor(
        private http: HttpClient
    ) {}

    setCollectionList() {
        this.http.get<any>('/api/collections').subscribe(
            (collectionList: CollectionListItem[]) => {
                this.collectionListSubject.next(collectionList['hydra:member']);
            },
            () => {}
        );
    }

    setCollectionCategoryData() {
        let collectionData: CollectionListItem[];
        let categoryData: Category[];
        this.collectionTreeDataSubject.next({});
        this.http.get<any>('/api/collections').subscribe(
            (collectionList: CollectionListItem[]) => {
                collectionData = collectionList['hydra:member'];
                this.http.get<any>('/api/collection/categories').subscribe(
                    (categoryList: Category[]) => {
                        categoryData = categoryList['hydra:member'];
                        this.processCollectionTreeData(collectionData, categoryData);
                    },
                    () => {}
                );
            },
            () => {}
        );
    }

    processCollectionTreeData(collectionData: CollectionListItem[], categoryData: Category[]) {
        const dataObject = {};
        dataObject['root'] = {};
        let index = 1;
        if (categoryData.length > 0) {
            categoryData.forEach((category) => {
                const collections = category.collectionId;
                if (collections.length > 0) {
                    dataObject['root'][index] = category;
                    collections.forEach((collection) => {
                        if (collectionData.filter(r => r.id === collection.id).length > 0) {
                            const collectionIndex = collectionData.findIndex(i => i.id === collection.id);
                            collectionData.splice(collectionIndex, 1);
                        }
                    });
                    index++;
                }
            });
        }
        if (collectionData.length > 0) {
            collectionData.forEach((collection) => {
                dataObject['root'][index] = collection;
                index++;
            });
        }
        this.collectionTreeDataSubject.next(dataObject);
    }
}
