import {NgModule} from '@angular/core';
import {ReactiveFormsModule} from '@angular/forms';

import {SymbiotaSharedModule} from 'symbiota-shared';

import {LoginComponent} from './login/login.component';
import {SessionExpireWarningDialogComponent} from './session-expire-warning-dialog/session-expire-warning-dialog.component';

import {AuthService} from './auth.service';

@NgModule({
    imports: [
        ReactiveFormsModule,
        SymbiotaSharedModule
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
        AuthService
    ],
    entryComponents: [
        LoginComponent,
        SessionExpireWarningDialogComponent
    ]
})
export class SymbiotaAuthModule {
}
