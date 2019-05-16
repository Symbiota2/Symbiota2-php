import {NgModule} from '@angular/core';
import {ReactiveFormsModule} from '@angular/forms';

import {SignupComponent} from './signup/signup.component';
import {LoginComponent} from './login/login.component';
import {SharedModule} from '../shared/shared.module';
import {AuthRoutingModule} from './auth-routing.module';
import {SessionExpireWarningDialogComponent} from './session-expire-warning-dialog/session-expire-warning-dialog.component';

@NgModule({
    imports: [
        ReactiveFormsModule,
        SharedModule,
        AuthRoutingModule
    ],
    exports: [
        LoginComponent,
        SessionExpireWarningDialogComponent
    ],
    declarations: [
        SignupComponent,
        LoginComponent,
        SessionExpireWarningDialogComponent
    ],
    entryComponents: [
        LoginComponent,
        SessionExpireWarningDialogComponent
    ]
})
export class AuthModule {}
