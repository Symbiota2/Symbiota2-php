import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

//import { CreateaccountComponent } from "./createaccount/createaccount.component";
//import { LoginComponent } from './login/login.component';

const routes: Routes = [
  //{ path: 'createaccount', component: CreateaccountComponent },
  //{ path: 'login', component: LoginComponent }
];

@NgModule({
  imports: [
    RouterModule.forChild(routes)
  ],
  exports: [RouterModule]
})
export class AuthRoutingModule {}
