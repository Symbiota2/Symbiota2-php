import {NgModule, APP_INITIALIZER, ErrorHandler} from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {HttpClientModule} from '@angular/common/http';

import {LayoutModule} from './layout/layout.module';
import {SpatialModule} from './spatial/spatial.module';
import {UserModule} from './user/user.module';
import {PluginAdminModule} from './plugin-admin/plugin-admin.module';
import {AppRoutingModule} from './app-routing.module';
import {SymbiotaPluginModule} from 'symbiota-plugin';
import {SymbiotaPluginLoaderModule} from 'symbiota-plugin-loader';
import {SymbiotaSpatialModule} from 'symbiota-spatial';
import {SymbiotaSharedModule} from 'symbiota-shared';
import {SymbiotaAuthModule} from 'symbiota-auth';
import {ErrorRoutingModule} from './error-handlers/error-routing.module';

import {AppComponent} from './app.component';

import {ConfigurationService} from 'symbiota-shared';
import {PluginLoaderService} from 'symbiota-plugin-loader';
import {ErrorHandlerService} from './error-handlers/error-handler.service';

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
    ],
    imports: [
        SpatialModule,
        BrowserModule,
        BrowserAnimationsModule,
        LayoutModule,
        UserModule,
        PluginAdminModule,
        HttpClientModule,
        AppRoutingModule,
        SymbiotaPluginModule,
        SymbiotaPluginLoaderModule,
        SymbiotaSpatialModule,
        SymbiotaSharedModule,
        SymbiotaAuthModule,
        ErrorRoutingModule
    ],
    providers: [
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
        },
        {
            provide: ErrorHandler,
            useClass: ErrorHandlerService
        }
    ],
    bootstrap: [AppComponent]
})
export class AppModule {
}
