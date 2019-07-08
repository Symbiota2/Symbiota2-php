import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {MapLayersDialogComponent} from './map-layers-dialog.component';

describe('MapLayersDialogComponent', () => {
    let component: MapLayersDialogComponent;
    let fixture: ComponentFixture<MapLayersDialogComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [MapLayersDialogComponent]
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(MapLayersDialogComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
