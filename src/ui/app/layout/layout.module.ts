import {NgModule} from '@angular/core';
import {TranslateModule} from "@ngx-translate/core";

import {SymbiotaSharedModule} from 'symbiota-shared';
import {SymbiotaPluginModule} from 'symbiota-plugin';
import {AppRoutingModule} from '../app-routing.module';

import {LayoutComponent} from './layout/layout.component';
import {HomeComponent} from './home/home.component';
import {FooterComponent} from './footer/footer.component';
import {BannerComponent} from './header/banner/banner.component';
import {TopnavComponent} from './header/topnav/topnav.component';
import {HeaderComponent} from './header/header.component';
import {SidepanelComponent} from './sidepanel/sidepanel.component';
import {SitemapComponent} from './sitemap/sitemap.component';
import {SidepanelLinksComponent} from './sidepanel-links/sidepanel-links.component';

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
