import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {BehaviorSubject, Observable} from 'rxjs';

import {Collection} from '../interfaces/collection.interface';
import {Category} from '../interfaces/collection.interface';

@Injectable({
    providedIn: 'root',
})
export class CollectionService {
    private static readonly CATEGORY_BASE_URL = "/api/collection/categories";
    private static readonly COLLECTION_BASE_URL = "/api/collections";

    private collectionListSubject = new BehaviorSubject<Collection[]>([]);
    public readonly collectionList: Observable<Collection[]> = this.collectionListSubject.asObservable();
    private collectionTreeDataSubject = new BehaviorSubject<object>({});
    public readonly collectionTreeData: Observable<object> = this.collectionTreeDataSubject.asObservable();

    constructor(private http: HttpClient) {}

    getCategories(): Observable<Category[]> {
        return this.http.get<Category[]>(
            CollectionService.CATEGORY_BASE_URL,
            { headers: { accept: "application/json" } }
        );
    }

    getCollectionByID(id: number): Observable<Collection> {
        return this.http.get<Collection>(
            `${CollectionService.COLLECTION_BASE_URL}/${id}`,
            { headers: { accept: "application/json" } }
        );
    }

    setCollectionList() {
        this.http.get<any>('/api/collections').subscribe(
            (collectionList: Collection[]) => {
                this.collectionListSubject.next(collectionList['hydra:member']);
            },
            () => {}
        );
    }

    setCollectionCategoryData() {
        let collectionData: Collection[];
        let categoryData: Category[];
        this.collectionTreeDataSubject.next({});
        this.http.get<any>('/api/collections').subscribe(
            (collectionList: Collection[]) => {
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

    processCollectionTreeData(collectionData: Collection[], categoryData: Category[]) {
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
