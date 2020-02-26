import {NgModule} from '@angular/core';
import {TranslateModule} from "@ngx-translate/core";

import {SymbiotaSharedModule} from 'symbiota-shared';
import {SymbiotaPluginModule} from 'symbiota-plugin';
import {AppRoutingModule} from '../app-routing.module';

import {LayoutComponent} from './containers/layout/layout.component';
import {HomeComponent} from './components/home/home.component';
import {FooterComponent} from './components/footer/footer.component';
import {BannerComponent} from './components/banner/banner.component';
import {TopnavComponent} from './components/topnav/topnav.component';
import {HeaderComponent} from './containers/header/header.component';
import {SidepanelComponent} from './outlets/sidepanel/sidepanel.component';
import {SitemapComponent} from './outlets/sitemap/sitemap.component';
import {SidepanelLinksComponent} from './components/sidepanel-links/sidepanel-links.component';

@NgModule({
    declarations: [
        LayoutComponent,
        HomeComponent,
        FooterComponent,
        BannerComponent,
        TopnavComponent,
        HeaderComponent,
        SidepanelComponent,
        SitemapComponent,
        SidepanelLinksComponent
    ],
    imports: [
        AppRoutingModule,
        SymbiotaSharedModule,
        SymbiotaPluginModule,
        TranslateModule
    ],
    exports: [
        LayoutComponent,
        HomeComponent
    ],
    entryComponents: [
        SidepanelLinksComponent
    ],
    bootstrap: [
        LayoutComponent
    ]
})
export class LayoutModule {
}
