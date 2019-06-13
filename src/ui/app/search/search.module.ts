import {NgModule} from '@angular/core';
import {SharedModule} from '../shared/shared.module';

import {SearchComponent} from './search.component';
import {CollectionsComponent} from './collections/collections.component';

@NgModule({
    declarations: [
        SearchComponent,
        CollectionsComponent,
    ],
    imports: [
        SharedModule
    ],
    exports: [
        SearchComponent,
        CollectionsComponent,
    ],
    providers: [],
    bootstrap: [SearchComponent]
})
export class SearchModule {
}
