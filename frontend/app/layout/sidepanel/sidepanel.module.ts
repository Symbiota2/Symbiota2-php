import {NgModule} from '@angular/core';
import {SharedModule} from '../../shared/shared.module';

import {SidepanelComponent} from './sidepanel.component';

@NgModule({
    declarations: [
        SidepanelComponent
    ],
    imports: [
        SharedModule
    ],
    exports: [
        SidepanelComponent
    ],
    providers: [],
    bootstrap: [SidepanelComponent]
})
export class SidepanelModule {
}
