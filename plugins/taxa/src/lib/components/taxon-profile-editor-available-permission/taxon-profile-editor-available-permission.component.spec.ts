import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {TaxonProfileEditorAvailablePermissionComponent} from './taxon-profile-editor-available-permission.component';

describe('TaxonProfileEditorAvailablePermissionComponent', () => {
    let component: TaxonProfileEditorAvailablePermissionComponent;
    let fixture: ComponentFixture<TaxonProfileEditorAvailablePermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [TaxonProfileEditorAvailablePermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(TaxonProfileEditorAvailablePermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
