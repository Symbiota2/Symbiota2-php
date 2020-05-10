import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {BehaviorSubject, Observable} from 'rxjs';

import {ChecklistListItem} from '../interfaces/checklist.interface';
import {CollectionListItem} from '../../../../collection/src/lib/interfaces/collection.interface';

@Injectable({
    providedIn: 'root',
})
export class ChecklistService {
    private checklistListSubject = new BehaviorSubject<ChecklistListItem[]>([]);
    public readonly checklistList: Observable<ChecklistListItem[]> = this.checklistListSubject.asObservable();

    constructor(
        private http: HttpClient
    ) {}

    setChecklistList() {
        this.http.get<any>('/api/checklists').subscribe(
            (checklistList: ChecklistListItem[]) => {
                this.checklistListSubject.next(checklistList['hydra:member']);
            },
            () => {}
        );
    }
}
