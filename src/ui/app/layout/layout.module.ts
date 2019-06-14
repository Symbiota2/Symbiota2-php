import {NgModule} from '@angular/core';

import {SymbiotaSharedModule} from 'symbiota-shared';
import {AppRoutingModule} from '../app-routing.module';

import {LayoutComponent} from './layout.component';
import {HomeComponent} from './home/home.component';
import {FooterComponent} from './footer/footer.component';
import {BannerComponent} from './header/banner/banner.component';
import {TopnavComponent} from './header/topnav/topnav.component';
import {HeaderComponent} from './header/header.component';
import {SidepanelComponent} from './sidepanel/sidepanel.component';

@NgModule({
    declarations: [
        LayoutComponent,
        HomeComponent,
        FooterComponent,
        BannerComponent,
        TopnavComponent,
        HeaderComponent,
        SidepanelComponent
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
