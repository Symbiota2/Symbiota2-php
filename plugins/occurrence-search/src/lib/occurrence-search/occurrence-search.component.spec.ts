import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {OccurrenceSearchComponent} from './occurrence-search.component';

describe('OccurrenceSearchComponent', () => {
    let component: OccurrenceSearchComponent;
    let fixture: ComponentFixture<OccurrenceSearchComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [OccurrenceSearchComponent]
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(OccurrenceSearchComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
