import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {TranslateModule} from "@ngx-translate/core";

import {SymbiotaSharedModule} from 'symbiota-shared';
import {SymbiotaPluginModule} from 'symbiota-plugin';
import {UserRoutingModule} from './user-routing.module';

import {SignupComponent} from './containers/signup/signup.component';
import {UserProfileComponent} from './outlets/user-profile/user-profile.component';
import {EditProfileComponent} from './containers/edit-profile/edit-profile.component';

import {UserService} from './services/user.service';
import {UserFormComponent} from './components/user-form/user-form.component';

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
