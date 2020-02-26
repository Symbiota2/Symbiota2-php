import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {SpatialAnalysisComponent} from './spatial-analysis.component';

describe('SpatialAnalysisComponent', () => {
    let component: SpatialAnalysisComponent;
    let fixture: ComponentFixture<SpatialAnalysisComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [SpatialAnalysisComponent]
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(SpatialAnalysisComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
