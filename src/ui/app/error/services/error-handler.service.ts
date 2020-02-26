import {Injectable, ErrorHandler, Injector} from '@angular/core';
import {HttpErrorResponse} from '@angular/common/http';
import {TranslateService} from '@ngx-translate/core';

import {AlertService} from 'symbiota-shared';
import {SpinnerOverlayService} from 'symbiota-shared';
import {ConfigurationService} from 'symbiota-shared';

@Injectable()
export class ErrorHandlerService implements ErrorHandler {

    no_internet: string;

    constructor(
        private injector: Injector,
        private translate: TranslateService,
        private configService: ConfigurationService
    ) {
        this.configService.selectedLanguageValue.subscribe(value => {
            this.setTranslations();
        });
    }

    setTranslations() {
        this.translate.get('core.error.no_internet').subscribe((res: string) => {
            this.no_internet = res;
        });
    }

    handleError(error: Error | HttpErrorResponse) {
        const alertService = this.injector.get(AlertService);
        const spinnerService = this.injector.get(SpinnerOverlayService);

        if (error instanceof HttpErrorResponse) {
            if (!navigator.onLine) {
                spinnerService.hide();
                alertService.showErrorSnackbar(
                    this.no_internet,
                    '',
                    5000
                );
            } else {
                spinnerService.hide();
                alertService.showErrorSnackbar(
                    `${error.status} - ${error.message}`,
                    '',
                    5000
                );
            }
        } else {
            spinnerService.hide();
            alertService.showErrorSnackbar(
                `${error.message}`,
                '',
                5000
            );
        }

        console.error(error);
    }
}
