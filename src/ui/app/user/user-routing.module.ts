import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';

import {SignupComponent} from './containers/signup/signup.component';
import {UserProfileComponent} from './outlets/user-profile/user-profile.component';

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
