import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {SymbiotaSharedModule} from 'symbiota-shared';
import {UserRoutingModule} from './user-routing.module';

import {SignupComponent} from './signup/signup.component';
import {UserProfileComponent} from './user-profile/user-profile.component';
import {EditProfileComponent} from './edit-profile/edit-profile.component';

import {UserService} from './user.service';

@NgModule({
    declarations: [
        SignupComponent,
        UserProfileComponent,
        EditProfileComponent
    ],
    imports: [
        CommonModule,
        SymbiotaSharedModule,
        UserRoutingModule
    ],
    entryComponents: [
        EditProfileComponent
    ],
    providers: [
        UserService
    ]
})
export class UserModule {
}
