import {NgModule} from '@angular/core';
import {SharedModule} from "../../shared/shared.module";

import {BannerComponent} from './banner/banner.component';
import {TopnavComponent} from './topnav/topnav.component';
import {HeaderComponent} from "./header.component";

@NgModule({
    declarations: [
        HeaderComponent,
        BannerComponent,
        TopnavComponent
    ],
    imports: [
        SharedModule
    ],
    exports: [
        HeaderComponent,
        BannerComponent,
        TopnavComponent
    ],
    providers: [],
    bootstrap: [HeaderComponent]
})
export class HeaderModule {
}
