import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {MapSettingsDialogComponent} from './map-settings-dialog.component';

describe('MapSettingsDialogComponent', () => {
    let component: MapSettingsDialogComponent;
    let fixture: ComponentFixture<MapSettingsDialogComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [MapSettingsDialogComponent]
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(MapSettingsDialogComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
