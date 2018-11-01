import { NgModule } from '@angular/core';
import { StoreModule } from "@ngrx/store";
import { HttpClientModule } from "@angular/common/http";

import { SharedModule } from "./shared/shared.module";
import { LayoutModule } from "./layout/layout.module";
import { AuthModule } from "./auth/auth.module";
import { AppRoutingModule } from "./app-routing.module";
import { EnvironmentModule } from "./shared/environment";
import { AuthenticationModule } from "./shared/authentication";
import { FormValidationModule } from "./shared/form-validation";
import { NotificationModule } from "./shared/notification";

import { AppComponent } from './app.component';
import { SearchComponent } from './search/search.component';
import { CollectionsComponent } from './search/collections/collections.component';
import { SpatialComponent } from './spatial/spatial.component';
import { LoginComponent } from './account/login/login.component';

import { AuthService } from "./auth/auth.service";
import { LoginService } from "./account/login/login.service";
import { UIService } from "./shared/ui.service";
import { omcollectionsService } from "./search/omcollections.service";
import { SnotifyModule, SnotifyService, ToastDefaults } from 'ng-snotify';

import { reducers } from './app.reducer';

@NgModule({
  declarations: [
    AppComponent,
    SearchComponent,
      LoginComponent,
    CollectionsComponent,
    SpatialComponent
  ],
  imports: [
    SharedModule,
    LayoutModule,
      HttpClientModule,
    AppRoutingModule,
      EnvironmentModule,
      AuthenticationModule,
      FormValidationModule,
      NotificationModule,
    AuthModule,
      SnotifyModule,
    StoreModule.forRoot(reducers)
  ],
  providers: [
    AuthService,
      LoginService,
    omcollectionsService,
    UIService,
      { provide: 'SnotifyToastConfig', useValue: ToastDefaults},
      SnotifyService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
