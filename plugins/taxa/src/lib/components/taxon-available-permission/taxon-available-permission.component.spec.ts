import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {TaxonAvailablePermissionComponent} from './taxon-available-permission.component';

describe('TaxonAvailablePermissionComponent', () => {
    let component: TaxonAvailablePermissionComponent;
    let fixture: ComponentFixture<TaxonAvailablePermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [TaxonAvailablePermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(TaxonAvailablePermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
