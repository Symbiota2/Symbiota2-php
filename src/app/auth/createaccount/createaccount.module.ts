import { NgModule } from '@angular/core';

import { SharedModule } from "../../shared/shared.module";

import { CreateaccountComponent } from './createaccount.component';

@NgModule({
  declarations: [
    CreateaccountComponent
  ],
  imports: [
    SharedModule
  ],
  exports: [
    CreateaccountComponent
  ],
  providers: [],
  bootstrap: [ CreateaccountComponent ]
})
export class CreateAccountModule { }
