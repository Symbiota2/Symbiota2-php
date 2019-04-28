import {NgModule} from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {FlexLayoutModule} from '@angular/flex-layout';
import {ReactiveFormsModule} from '@angular/forms';
import {FormsModule} from '@angular/forms';
import {AppRoutingModule} from '../app-routing.module';
import {CommonModule} from '@angular/common';

import {MaterialModule} from '../material.module';

import {SpinnerOverlayComponent} from './spinner-overlay/spinner-overlay.component';

@NgModule({
    imports: [
        BrowserModule,
        BrowserAnimationsModule,
        AppRoutingModule,
        FlexLayoutModule,
        ReactiveFormsModule,
        FormsModule,
        CommonModule,
        MaterialModule
    ],
    exports: [
        BrowserModule,
        BrowserAnimationsModule,
        AppRoutingModule,
        FlexLayoutModule,
        ReactiveFormsModule,
        FormsModule,
        CommonModule,
        MaterialModule,
        SpinnerOverlayComponent
    ],
    declarations: [
        SpinnerOverlayComponent
    ],
    entryComponents: [
        SpinnerOverlayComponent
    ]
})
export class SharedModule {
}
