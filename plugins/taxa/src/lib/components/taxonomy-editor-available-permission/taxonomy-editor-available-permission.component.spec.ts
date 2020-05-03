import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {TaxonomyEditorAvailablePermissionComponent} from './taxonomy-editor-available-permission.component';

describe('TaxonomyEditorAvailablePermissionComponent', () => {
    let component: TaxonomyEditorAvailablePermissionComponent;
    let fixture: ComponentFixture<TaxonomyEditorAvailablePermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [TaxonomyEditorAvailablePermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(TaxonomyEditorAvailablePermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
