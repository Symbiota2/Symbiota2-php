import { NgModule } from '@angular/core';
import { StoreModule } from "@ngrx/store";

import { SharedModule } from "./shared/shared.module";
import { LayoutModule } from "./layout/layout.module";
import { AuthModule } from "./auth/auth.module";
import { AppRoutingModule } from "./app-routing.module";

import { AppComponent } from './app.component';
import { SearchComponent } from './search/search.component';
import { CollectionsComponent } from './search/collections/collections.component';
import { SpatialComponent } from './spatial/spatial.component';

import { AuthService } from "./auth/auth.service";
import { UIService } from "./shared/ui.service";
import { omcollectionsService } from "./search/omcollections.service";

import { reducers } from './app.reducer';

@NgModule({
  declarations: [
    AppComponent,
    SearchComponent,
    CollectionsComponent,
    SpatialComponent
  ],
  imports: [
    SharedModule,
    LayoutModule,
    AppRoutingModule,
    AuthModule,
    StoreModule.forRoot(reducers)
  ],
  providers: [
    AuthService,
    omcollectionsService,
    UIService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
