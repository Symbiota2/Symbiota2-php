import {Injectable} from '@angular/core';
import {CollectionListData} from './collection-list-data.model';

@Injectable({
    providedIn: 'root'
})
export class CollectionListService {
    private collections: object = {
        root: {
            1: {
                name: 'Southwest',
                collections: [
                    {collid: 10, collname: 'Coll 10', colltype: 'specimen'},
                    {collid: 11, collname: 'Coll 11', colltype: 'observation'},
                    {collid: 12, collname: 'Coll 12', colltype: 'specimen'}
                ]
            },
            2: {
                name: 'Northwest',
                collections: [
                    {collid: 20, collname: 'Coll 20', colltype: 'specimen'},
                    {collid: 21, collname: 'Coll 21', colltype: 'observation'},
                    {collid: 22, collname: 'Coll 22', colltype: 'specimen'}
                ]
            },
            3: {
                name: 'Rocky Mountain',
                collections: [
                    {collid: 30, collname: 'Coll 30', colltype: 'specimen'},
                    {collid: 31, collname: 'Coll 31', colltype: 'observation'},
                    {collid: 32, collname: 'Coll 32', colltype: 'specimen'}
                ]
            },
            col40: {collid: 40, collname: 'Coll 40', colltype: 'specimen'},
            col41: {collid: 41, collname: 'Coll 41', colltype: 'specimen'},
            col42: {collid: 42, collname: 'Coll 42', colltype: 'specimen'}
        }
    };

    getCollections() {
        return this.collections;
    }
}
