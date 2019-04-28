import {NgModule} from '@angular/core';
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
import {UIService} from './shared/ui.service';
import {SpinnerOverlayService} from './shared/spinner-overlay.service';
import {omcollectionsService} from './search/omcollections.service';
import {SnotifyModule, SnotifyService, ToastDefaults} from 'ng-snotify';

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
        SnotifyModule,
        StoreModule.forRoot(reducers)
    ],
    providers: [
        AuthService,
        UIService,
        SpinnerOverlayService,
        omcollectionsService,
        {provide: 'SnotifyToastConfig', useValue: ToastDefaults},
        SnotifyService
    ],
    bootstrap: [AppComponent]
})
export class AppModule {
}
