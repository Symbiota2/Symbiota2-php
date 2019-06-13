import {NgModule} from '@angular/core';
import {MatTreeModule, MatCheckboxModule, MatIconModule, MatButtonModule} from '@angular/material';
import {BrowserModule} from '@angular/platform-browser';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {FlexLayoutModule} from '@angular/flex-layout';
import {ReactiveFormsModule} from '@angular/forms';
import {FormsModule} from '@angular/forms';
import {CommonModule} from '@angular/common';

import {CollectionListService} from './collection-list.service';

import {CollectionCheckboxListComponent} from './collection-checkbox-list.component';

@NgModule({
    declarations: [
        CollectionCheckboxListComponent
    ],
    imports: [
        MatTreeModule,
        MatCheckboxModule,
        MatIconModule,
        MatButtonModule,
        BrowserModule,
        BrowserAnimationsModule,
        FlexLayoutModule,
        ReactiveFormsModule,
        FormsModule,
        CommonModule
    ],
    exports: [
        CollectionCheckboxListComponent
    ],
    entryComponents: [
        CollectionCheckboxListComponent
    ],
    providers: [
        CollectionListService,
        {
            provide: 'collection-checkbox-list',
            useValue: [{
                name: 'collection-collection-checkbox-list',
                component: CollectionCheckboxListComponent
            }],
            multi: true
        }
    ]
})
export class CollectionModule {
}
