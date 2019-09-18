import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {TranslateService} from "@ngx-translate/core";

import {SpinnerOverlayService} from './spinner-overlay.service';
import {AlertService} from './alert.service';

@Injectable({
    providedIn: 'root'
})
export class ConfigurationService {

    data: any;

    constructor(
        private http: HttpClient,
        private alertService: AlertService,
        private spinnerService: SpinnerOverlayService,
        private translate: TranslateService
    ) {}

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
                    const errorMessage = this.translate.get('symbiota-shared.configuration-service.configuration_failed');
                    this.spinnerService.hide();
                    this.alertService.showErrorSnackbar(
                        errorMessage,
                        '',
                        5000
                    );
                    console.log(error);
                    resolve(this.data);
                }
            );
        });
    }
}
