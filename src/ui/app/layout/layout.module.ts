import {NgModule} from '@angular/core';

import {SymbiotaSharedModule} from 'symbiota-shared';
import {AppRoutingModule} from '../app-routing.module';

import {LayoutComponent} from './layout/layout.component';
import {HomeComponent} from './home/home.component';
import {FooterComponent} from './footer/footer.component';
import {BannerComponent} from './header/banner/banner.component';
import {TopnavComponent} from './header/topnav/topnav.component';
import {HeaderComponent} from './header/header.component';
import {SidepanelComponent} from './sidepanel/sidepanel.component';
import {SitemapComponent} from './sitemap/sitemap.component';

@NgModule({
    declarations: [
        LayoutComponent,
        HomeComponent,
        FooterComponent,
        BannerComponent,
        TopnavComponent,
        HeaderComponent,
        SidepanelComponent,
        SitemapComponent
    ],
    imports: [
        AppRoutingModule,
        SymbiotaSharedModule
    ],
    exports: [
        LayoutComponent,
        HomeComponent
    ],
    providers: [],
    bootstrap: [
        LayoutComponent
    ]
})
export class LayoutModule {
}
