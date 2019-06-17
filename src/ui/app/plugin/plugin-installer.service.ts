import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {BehaviorSubject, Observable} from 'rxjs';
import {filter} from 'rxjs/operators';

import {AvailablePluginData} from './available-plugin-data.model';

@Injectable({
    providedIn: 'root'
})
export class PluginInstallerService {
    private pluginListSubject = new BehaviorSubject<AvailablePluginData[]>(undefined);
    pluginList$: Observable<AvailablePluginData[]> = this.pluginListSubject.asObservable().pipe(
        filter(pluginList => !!pluginList)
    );

    constructor(
        private http: HttpClient
    ) {
        http.get<AvailablePluginData[]>('/api/pluginregistry').subscribe(
            pluginList => {
                this.pluginListSubject.next(pluginList ? pluginList : undefined);
            }
        );
    }
}
