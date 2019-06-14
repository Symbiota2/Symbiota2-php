import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {SymbiotaSharedModule} from 'symbiota-shared';
import {UserRoutingModule} from './user-routing.module';

import {SignupComponent} from './signup/signup.component';

import {UserService} from './user.service';
import { UserProfileComponent } from './user-profile/user-profile.component';

@NgModule({
    declarations: [
        SignupComponent,
        UserProfileComponent
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
