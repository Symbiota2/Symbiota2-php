import { NgModule } from '@angular/core';

//import { CreateaccountComponent } from "./createaccount/createaccount.component";
//import { LoginComponent } from './login/login.component';
import { SharedModule } from '../shared/shared.module';
import { AuthRoutingModule } from './auth-routing.module';

@NgModule({
  declarations: [/*CreateaccountComponent, LoginComponent*/],
  imports: [
    SharedModule,
    AuthRoutingModule
  ]
})
export class AuthModule {}
