import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';

import {SpinnerOverlayService} from './spinner-overlay.service';

@Injectable({
    providedIn: 'root'
})
export class ConfigurationService {

    data: any;

    constructor(private http: HttpClient, private spinnerService: SpinnerOverlayService) {}

    load(): Promise<any> {
        this.spinnerService.show();
        return new Promise<any>(resolve => {
            this.http.get('/api/clientconfigurations').subscribe(
                (res) => {
                    this.data = res;
                    resolve(this.data);
                    this.spinnerService.hide();
                },
                (error) => {
                    console.log(error);
                }
            );
        });
    }
}
