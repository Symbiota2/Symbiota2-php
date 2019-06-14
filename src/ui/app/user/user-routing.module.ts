import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';

import {SignupComponent} from './signup/signup.component';
import {UserProfileComponent} from './user-profile/user-profile.component';

const routes: Routes = [
    { path: 'signup', component: SignupComponent },
    { path: 'viewprofile', component: UserProfileComponent }
];

@NgModule({
    imports: [
        RouterModule.forChild(routes)
    ],
    exports: [RouterModule]
})
export class UserRoutingModule {
}
