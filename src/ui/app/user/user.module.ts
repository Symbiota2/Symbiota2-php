import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {SymbiotaSharedModule} from 'symbiota-shared';
import {UserRoutingModule} from './user-routing.module';

import {SignupComponent} from './signup/signup.component';

import {UserService} from './user.service';

@NgModule({
    declarations: [
        SignupComponent
    ],
    imports: [
        CommonModule,
        SymbiotaSharedModule,
        UserRoutingModule
    ],
    providers: [
        UserService
    ]
})
export class UserModule {
}
