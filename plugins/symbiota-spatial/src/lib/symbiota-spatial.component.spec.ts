import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {SymbiotaSpatialComponent} from './symbiota-spatial.component';

describe('SymbiotaSpatialComponent', () => {
    let component: SymbiotaSpatialComponent;
    let fixture: ComponentFixture<SymbiotaSpatialComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [SymbiotaSpatialComponent]
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(SymbiotaSpatialComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
