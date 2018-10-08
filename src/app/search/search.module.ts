import { NgModule } from '@angular/core';
import { SharedModule } from "../shared/shared.module";

import { SearchComponent } from './search.component';
import { CollectionsComponent } from './collections/collections.component';
import { MapComponent } from "./map/map.component";

@NgModule({
  declarations: [
    SearchComponent,
    CollectionsComponent,
    MapComponent
  ],
  imports: [
    SharedModule
  ],
  exports: [
    SearchComponent,
    CollectionsComponent,
    MapComponent
  ],
  providers: [],
  bootstrap: [ SearchComponent ]
})
export class LayoutModule { }
