import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {KeyAdminAvailablePermissionComponent} from './key-admin-available-permission.component';

describe('KeyAdminAvailablePermissionComponent', () => {
    let component: KeyAdminAvailablePermissionComponent;
    let fixture: ComponentFixture<KeyAdminAvailablePermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [KeyAdminAvailablePermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(KeyAdminAvailablePermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
