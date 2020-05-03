import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {KeyEditorCurrentPermissionComponent} from './key-editor-current-permission.component';

describe('KeyEditorCurrentPermissionComponent', () => {
    let component: KeyEditorCurrentPermissionComponent;
    let fixture: ComponentFixture<KeyEditorCurrentPermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [KeyEditorCurrentPermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(KeyEditorCurrentPermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
