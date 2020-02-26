import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {VectorToolsTabComponent} from './vector-tools-tab.component';

describe('VectorToolsTabComponent', () => {
    let component: VectorToolsTabComponent;
    let fixture: ComponentFixture<VectorToolsTabComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [VectorToolsTabComponent]
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(VectorToolsTabComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
