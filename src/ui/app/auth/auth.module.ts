import {NgModule} from '@angular/core';
import {ReactiveFormsModule} from '@angular/forms';

import {SharedModule} from '../shared/shared.module';

import {LoginComponent} from './login/login.component';
import {SessionExpireWarningDialogComponent} from './session-expire-warning-dialog/session-expire-warning-dialog.component';

import {AuthService} from './auth.service';

@NgModule({
    imports: [
        ReactiveFormsModule,
        SharedModule,
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
export class AuthModule {}
