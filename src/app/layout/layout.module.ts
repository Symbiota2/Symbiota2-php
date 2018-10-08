import { NgModule } from '@angular/core';
import { SharedModule } from "../shared/shared.module";

import { HeaderModule } from "./header/header.module";
import { SidepanelModule } from "./sidepanel/sidepanel.module";
import { FooterModule } from "./footer/footer.module";

import { LayoutComponent } from './layout.component';
import { HomeComponent } from './home/home.component';

@NgModule({
  declarations: [
    LayoutComponent,
    HomeComponent
  ],
  imports: [
    SharedModule,
    HeaderModule,
    SidepanelModule,
    FooterModule
  ],
  exports: [
    LayoutComponent,
    HomeComponent
  ],
  providers: [],
  bootstrap: [ LayoutComponent ]
})
export class LayoutModule { }
