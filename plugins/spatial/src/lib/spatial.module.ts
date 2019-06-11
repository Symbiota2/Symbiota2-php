import {NgModule} from '@angular/core';
import {SpatialComponent} from './spatial.component';

@NgModule({
    declarations: [
        SpatialComponent
    ],
    imports: [],
    exports: [
        SpatialComponent
    ],
    entryComponents: [
        SpatialComponent
    ],
    providers: [
        {
            provide: 'spatial-component',
            useValue: [{
                name: 'lib-spatial',
                component: SpatialComponent
            }],
            multi: true
        }
    ]
})
export class SpatialModule {
}
