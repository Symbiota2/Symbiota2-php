import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {BehaviorSubject, Observable} from 'rxjs';

import {ProjectListItem} from '../interfaces/project.interface';

@Injectable({
    providedIn: 'root',
})
export class ProjectService {
    private projectListSubject = new BehaviorSubject<ProjectListItem[]>([]);
    public readonly projectList: Observable<ProjectListItem[]> = this.projectListSubject.asObservable();

    constructor(
        private http: HttpClient
    ) {}

    setProjectList() {
        this.http.get<any>('/api/checklist/checklistprojects').subscribe(
            (projectList: ProjectListItem[]) => {
                this.projectListSubject.next(projectList['hydra:member']);
            },
            () => {}
        );
    }
}
