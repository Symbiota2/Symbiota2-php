import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {TaxonomyEditorCurrentPermissionComponent} from './taxonomy-editor-current-permission.component';

describe('TaxonomyEditorCurrentPermissionComponent', () => {
    let component: TaxonomyEditorCurrentPermissionComponent;
    let fixture: ComponentFixture<TaxonomyEditorCurrentPermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [TaxonomyEditorCurrentPermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(TaxonomyEditorCurrentPermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
