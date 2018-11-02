import {NgModule} from '@angular/core';
import {StoreModule} from "@ngrx/store";
import {HttpClientModule} from "@angular/common/http";

import {SharedModule} from "./shared/shared.module";
import {LayoutModule} from "./layout/layout.module";
import {AppRoutingModule} from "./app-routing.module";
import {EnvironmentModule} from "./shared/environment/environment.module";
import {AuthenticationModule} from "./auth/authentication.module";
import {FormValidationModule} from "./shared/form-validation/form-validation.module";
import {NotificationModule} from "./shared/notification/notification.module";

import {AppComponent} from './app.component';
import {SearchComponent} from './search/search.component';
import {CollectionsComponent} from './search/collections/collections.component';
import {SpatialComponent} from './spatial/spatial.component';
import {LoginComponent} from './auth/login/login.component';

import {LoginService} from "./auth/login.service";
import {UIService} from "./shared/ui.service";
import {omcollectionsService} from "./search/omcollections.service";
import {SnotifyModule, SnotifyService, ToastDefaults} from 'ng-snotify';
import {AuthenticationService} from "./auth/authentication.service";
import {ServerService} from "./server.service";
import {TokenStorageService} from "./auth/token-storage.service";

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
        SnotifyModule
    ],
    providers: [
        LoginService,
        omcollectionsService,
        UIService,
        AuthenticationService,
        ServerService,
        TokenStorageService,
        {provide: 'SnotifyToastConfig', useValue: ToastDefaults},
        SnotifyService
    ],
    bootstrap: [AppComponent]
})
export class AppModule {
}
