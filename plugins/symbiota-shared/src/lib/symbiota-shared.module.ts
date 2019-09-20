import {NgModule} from '@angular/core';
import {FlexLayoutModule} from '@angular/flex-layout';
import {ReactiveFormsModule} from '@angular/forms';
import {FormsModule} from '@angular/forms';
import {CommonModule} from '@angular/common';
import {TranslateModule} from "@ngx-translate/core";

import {MaterialModule} from './material.module';

import {SpinnerOverlayComponent} from './spinner-overlay/spinner-overlay.component';
import {CaptchaComponent} from './captcha/captcha.component';

import {SpinnerOverlayService} from './spinner-overlay.service';
import {AlertService} from './alert.service';
import {ConfigurationService} from './configuration.service';
import {SharedToolsService} from './shared-tools.service';

@NgModule({
    imports: [
        FlexLayoutModule,
        ReactiveFormsModule,
        FormsModule,
        CommonModule,
        MaterialModule,
        TranslateModule
    ],
    exports: [
        FlexLayoutModule,
        ReactiveFormsModule,
        FormsModule,
        CommonModule,
        MaterialModule,
        SpinnerOverlayComponent,
        CaptchaComponent
    ],
    declarations: [
        SpinnerOverlayComponent,
        CaptchaComponent
    ],
    providers: [
        SpinnerOverlayService,
        AlertService,
        ConfigurationService,
        SharedToolsService
    ],
    entryComponents: [
        SpinnerOverlayComponent,
        CaptchaComponent
    ]
})
export class SymbiotaSharedModule {
}
