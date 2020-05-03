import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {TaxonProfileEditorCurrentPermissionComponent} from './taxon-profile-editor-current-permission.component';

describe('TaxonProfileEditorCurrentPermissionComponent', () => {
    let component: TaxonProfileEditorCurrentPermissionComponent;
    let fixture: ComponentFixture<TaxonProfileEditorCurrentPermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [TaxonProfileEditorCurrentPermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(TaxonProfileEditorCurrentPermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
