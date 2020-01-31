import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {TranslateModule} from "@ngx-translate/core";

import {SymbiotaSharedModule} from 'symbiota-shared';
import {SymbiotaPluginModule} from 'symbiota-plugin';
import {UserRoutingModule} from './user-routing.module';

import {SignupComponent} from './signup/signup.component';
import {UserProfileComponent} from './user-profile/user-profile.component';
import {EditProfileComponent} from './edit-profile/edit-profile.component';

import {UserService} from './user.service';
import {UserFormComponent} from './user-form/user-form.component';

@NgModule({
    declarations: [
        SignupComponent,
        UserProfileComponent,
        EditProfileComponent,
        UserFormComponent
    ],
    imports: [
        CommonModule,
        SymbiotaSharedModule,
        UserRoutingModule,
        SymbiotaPluginModule,
        TranslateModule
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
