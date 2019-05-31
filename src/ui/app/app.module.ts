import {NgModule, APP_INITIALIZER} from '@angular/core';
import {StoreModule} from '@ngrx/store';
import {HttpClientModule} from '@angular/common/http';

import {reducers} from './app.reducer';

import {AuthModule} from './auth/auth.module';
import {SharedModule} from './shared/shared.module';
import {LayoutModule} from './layout/layout.module';
import {AppRoutingModule} from './app-routing.module';

import {AppComponent} from './app.component';
import {SearchComponent} from './search/search.component';
import {CollectionsComponent} from './search/collections/collections.component';
import {SpatialComponent} from './spatial/spatial.component';

import {AuthService} from './auth/auth.service';
import {SpinnerOverlayService} from './shared/spinner-overlay.service';
import {AlertService} from './shared/alert.service';
import {omcollectionsService} from './search/omcollections.service';
import {ConfigurationService} from './configuration.service';

export function setupConfigServiceFactory(
    service: ConfigurationService
): Function {
    return () => service.load();
}

@NgModule({
    declarations: [
        AppComponent,
        SearchComponent,
        CollectionsComponent,
        SpatialComponent
    ],
    imports: [
        AuthModule,
        SharedModule,
        LayoutModule,
        HttpClientModule,
        AppRoutingModule,
        StoreModule.forRoot(reducers)
    ],
    providers: [
        AuthService,
        SpinnerOverlayService,
        AlertService,
        omcollectionsService,
        {
            provide: APP_INITIALIZER,
            useFactory: setupConfigServiceFactory,
            deps: [ConfigurationService],
            multi: true
        }
    ],
    bootstrap: [AppComponent]
})
export class AppModule {
}
