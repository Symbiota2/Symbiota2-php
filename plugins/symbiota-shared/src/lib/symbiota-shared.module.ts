import {NgModule} from '@angular/core';
import {FlexLayoutModule} from '@angular/flex-layout';
import {ReactiveFormsModule} from '@angular/forms';
import {FormsModule} from '@angular/forms';
import {LayoutModule} from '@angular/cdk/layout';
import {CommonModule} from '@angular/common';
import {TranslateModule} from "@ngx-translate/core";

import {MaterialModule} from './material.module';

import {SpinnerOverlayComponent} from './components/spinner-overlay/spinner-overlay.component';
import {CaptchaComponent} from './components/captcha/captcha.component';

import {PermissionService} from './services/permission.service';
import {SpinnerOverlayService} from './services/spinner-overlay.service';
import {AlertService} from './services/alert.service';
import {ConfigurationService} from './services/configuration.service';
import {SharedToolsService} from './services/shared-tools.service';
import {SharedUserService} from './services/shared-user.service';

@NgModule({
    imports: [
        FlexLayoutModule,
        ReactiveFormsModule,
        FormsModule,
        LayoutModule,
        CommonModule,
        MaterialModule,
        TranslateModule
    ],
    exports: [
        FlexLayoutModule,
        ReactiveFormsModule,
        FormsModule,
        LayoutModule,
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
        PermissionService,
        SpinnerOverlayService,
        AlertService,
        ConfigurationService,
        SharedToolsService,
        SharedUserService
    ],
    entryComponents: [
        SpinnerOverlayComponent,
        CaptchaComponent
    ]
})
export class SymbiotaSharedModule {
}
