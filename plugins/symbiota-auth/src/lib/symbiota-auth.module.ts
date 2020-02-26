import {NgModule} from '@angular/core';
import {ReactiveFormsModule} from '@angular/forms';
import {TranslateModule} from "@ngx-translate/core";

import {SymbiotaSharedModule} from 'symbiota-shared';

import {LoginComponent} from './components/login/login.component';
import {SessionExpireWarningDialogComponent} from './components/session-expire-warning-dialog/session-expire-warning-dialog.component';

import {AuthService} from './services/auth.service';
import {LoginComponentService} from "./services/login-component.service";

@NgModule({
    imports: [
        ReactiveFormsModule,
        SymbiotaSharedModule,
        TranslateModule
    ],
    exports: [
        LoginComponent,
        SessionExpireWarningDialogComponent
    ],
    declarations: [
        LoginComponent,
        SessionExpireWarningDialogComponent
    ],
    providers: [
        AuthService,
        LoginComponentService
    ],
    entryComponents: [
        LoginComponent,
        SessionExpireWarningDialogComponent
    ]
})
export class SymbiotaAuthModule {
}
