import {Injectable, ErrorHandler, Injector} from '@angular/core';
import {HttpErrorResponse} from '@angular/common/http';

import {AlertService} from 'symbiota-shared';
import {SpinnerOverlayService} from 'symbiota-shared';

@Injectable()
export class ErrorHandlerService implements ErrorHandler {

    constructor(
        private injector: Injector
    ) { }

    handleError(error: Error | HttpErrorResponse) {
        const alertService = this.injector.get(AlertService);
        const spinnerService = this.injector.get(SpinnerOverlayService);

        if (error instanceof HttpErrorResponse) {
            if (!navigator.onLine) {
                spinnerService.hide();
                alertService.showErrorSnackbar(
                    'No Internet Connection',
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
