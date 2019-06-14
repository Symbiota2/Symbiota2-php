import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {SharedModule} from '../shared/shared.module';
import {UserRoutingModule} from './user-routing.module';

import {SignupComponent} from './signup/signup.component';

import {UserService} from './user.service';

@NgModule({
    declarations: [
        SignupComponent
    ],
    imports: [
        CommonModule,
        SharedModule,
        UserRoutingModule
    ],
    providers: [
        UserService
    ]
})
export class UserModule {
}
