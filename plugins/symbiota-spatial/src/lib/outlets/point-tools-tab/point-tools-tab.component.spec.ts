import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {PointToolsTabComponent} from './point-tools-tab.component';

describe('PointToolsTabComponent', () => {
    let component: PointToolsTabComponent;
    let fixture: ComponentFixture<PointToolsTabComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [PointToolsTabComponent]
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(PointToolsTabComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
