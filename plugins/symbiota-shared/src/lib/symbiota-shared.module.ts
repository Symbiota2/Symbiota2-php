import {ModuleWithProviders, NgModule} from '@angular/core';
import {FlexLayoutModule} from '@angular/flex-layout';
import {ReactiveFormsModule} from '@angular/forms';
import {FormsModule} from '@angular/forms';
import {CommonModule} from '@angular/common';
import {TranslateLoader, TranslateModule} from '@ngx-translate/core';
import {TranslateHttpLoader} from '@ngx-translate/http-loader';

import {MaterialModule} from './material.module';

import {SpinnerOverlayComponent} from './spinner-overlay/spinner-overlay.component';
import {CaptchaComponent} from './captcha/captcha.component';

import {SpinnerOverlayService} from './spinner-overlay.service';
import {AlertService} from './alert.service';
import {ConfigurationService} from './configuration.service';
import {SharedToolsService} from './shared-tools.service';
import {HttpClient} from "@angular/common/http";

export function HttpLoaderFactory(http: HttpClient) {
    return new TranslateHttpLoader(http);
}

@NgModule({
    imports: [
        FlexLayoutModule,
        ReactiveFormsModule,
        FormsModule,
        CommonModule,
        MaterialModule,
        TranslateModule.forChild({
            loader: {
                provide: TranslateLoader,
                useFactory: HttpLoaderFactory,
                deps: [HttpClient]
            },
            isolate: false
        })
    ],
    exports: [
        FlexLayoutModule,
        ReactiveFormsModule,
        FormsModule,
        CommonModule,
        MaterialModule,
        SpinnerOverlayComponent,
        CaptchaComponent,
        TranslateModule
    ],
    declarations: [
        SpinnerOverlayComponent,
        CaptchaComponent
    ],
    entryComponents: [
        SpinnerOverlayComponent,
        CaptchaComponent
    ]
})
export class SymbiotaSharedModule {
    static forRoot(): ModuleWithProviders {
        return {
            ngModule: SymbiotaSharedModule,
            providers: [
                SpinnerOverlayService,
                AlertService,
                ConfigurationService,
                SharedToolsService
            ]
        }
    }
}
