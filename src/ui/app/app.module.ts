import {NgModule, APP_INITIALIZER} from '@angular/core';
import {HttpClientModule} from '@angular/common/http';

import {LayoutModule} from './layout/layout.module';
import {UserModule} from './user/user.module';
import {PluginModule} from './plugin/plugin.module';
import {AppRoutingModule} from './app-routing.module';
import {SymbiotaSpatialModule} from 'symbiota-spatial';
import {SymbiotaSharedModule} from 'symbiota-shared';
import {SymbiotaAuthModule} from 'symbiota-auth';

import {AppComponent} from './app.component';

import {ConfigurationService} from 'symbiota-shared';
import {PluginLoaderService} from './plugin/plugin-loader.service';

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
        LayoutModule,
        UserModule,
        PluginModule,
        HttpClientModule,
        AppRoutingModule,
        SymbiotaSpatialModule,
        SymbiotaSharedModule,
        SymbiotaAuthModule
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
        }
    ],
    bootstrap: [AppComponent]
})
export class AppModule {
}
