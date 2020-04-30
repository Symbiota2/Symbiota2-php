import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {TranslateModule} from "@ngx-translate/core";

import {SymbiotaSharedModule} from 'symbiota-shared';
import {SymbiotaPluginModule} from 'symbiota-plugin';
import {UserRoutingModule} from './user-routing.module';

import {SignupComponent} from './containers/signup/signup.component';
import {UserProfileComponent} from './outlets/user-profile/user-profile.component';
import {EditProfileComponent} from './containers/edit-profile/edit-profile.component';
import {UserPasswordComponent} from './components/user-password/user-password.component';
import {UserMetadataComponent} from './components/user-metadata/user-metadata.component';
import {UserManagementComponent} from './containers/user-management/user-management.component';
import {UserListComponent} from './components/user-list/user-list.component';
import {UserDetailComponent} from './components/user-detail/user-detail.component';

import {UserService} from './services/user.service';
import { UserPermissionsCurrentComponent } from './outlets/user-permissions-current/user-permissions-current.component';
import { UserPermissionsAvailableComponent } from './outlets/user-permissions-available/user-permissions-available.component';
import { SuperAdminCurrentPermissionComponent } from './components/super-admin-current-permission/super-admin-current-permission.component';
import { SuperAdminAvailablePermissionComponent } from './components/super-admin-available-permission/super-admin-available-permission.component';

@NgModule({
    declarations: [
        SignupComponent,
        UserProfileComponent,
        EditProfileComponent,
        UserPasswordComponent,
        UserMetadataComponent,
        UserListComponent,
        UserPermissionsCurrentComponent,
        UserPermissionsAvailableComponent,
        UserManagementComponent,
        UserDetailComponent,
        SuperAdminCurrentPermissionComponent,
        SuperAdminAvailablePermissionComponent
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
