import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {TaxonCurrentPermissionComponent} from './taxon-current-permission.component';

describe('TaxonCurrentPermissionComponent', () => {
    let component: TaxonCurrentPermissionComponent;
    let fixture: ComponentFixture<TaxonCurrentPermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [TaxonCurrentPermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(TaxonCurrentPermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
