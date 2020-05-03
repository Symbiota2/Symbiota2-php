import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {KeyEditorAvailablePermissionComponent} from './key-editor-available-permission.component';

describe('KeyEditorAvailablePermissionComponent', () => {
    let component: KeyEditorAvailablePermissionComponent;
    let fixture: ComponentFixture<KeyEditorAvailablePermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [KeyEditorAvailablePermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(KeyEditorAvailablePermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
