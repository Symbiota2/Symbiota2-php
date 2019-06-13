import {NgModule, APP_INITIALIZER} from '@angular/core';
import {StoreModule} from '@ngrx/store';
import {HttpClientModule} from '@angular/common/http';

import {reducers} from './app.reducer';

import {AuthModule} from './auth/auth.module';
import {SharedModule} from './shared/shared.module';
import {LayoutModule} from './layout/layout.module';
import {AppRoutingModule} from './app-routing.module';
import {SymbiotaSpatialModule} from 'symbiota-spatial';

import {AppComponent} from './app.component';
import {PluginOutletComponent} from './plugin-outlet.component';

import {AuthService} from './auth/auth.service';
import {SpinnerOverlayService} from './shared/spinner-overlay.service';
import {AlertService} from './shared/alert.service';
import {ConfigurationService} from './configuration.service';
import {PluginRouterService} from './plugin-router.service';
import {PluginLoaderService} from './plugin-loader.service';

export function setupConfigServiceFactory(
    service: ConfigurationService
): Function {
    return () => service.load();
}

export function setupPluginLoaderServiceFactory(
    service: PluginLoaderService
): Function {
    return () => service.initialize();
}

@NgModule({
    declarations: [
        AppComponent,
        PluginOutletComponent
    ],
    imports: [
        AuthModule,
        SharedModule,
        LayoutModule,
        HttpClientModule,
        AppRoutingModule,
        SymbiotaSpatialModule,
        StoreModule.forRoot(reducers)
    ],
    entryComponents: [
        PluginOutletComponent
    ],
    providers: [
        AuthService,
        PluginRouterService,
        SpinnerOverlayService,
        AlertService,
        {
            provide: APP_INITIALIZER,
            useFactory: setupConfigServiceFactory,
            deps: [ConfigurationService],
            multi: true
        },
        {
            provide: APP_INITIALIZER,
            useFactory: setupPluginLoaderServiceFactory,
            deps: [PluginLoaderService],
            multi: true
        }
    ],
    bootstrap: [AppComponent]
})
export class AppModule {
}
