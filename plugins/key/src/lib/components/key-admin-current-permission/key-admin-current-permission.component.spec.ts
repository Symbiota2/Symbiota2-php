import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {KeyAdminCurrentPermissionComponent} from './key-admin-current-permission.component';

describe('KeyAdminCurrentPermissionComponent', () => {
    let component: KeyAdminCurrentPermissionComponent;
    let fixture: ComponentFixture<KeyAdminCurrentPermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [KeyAdminCurrentPermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(KeyAdminCurrentPermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
