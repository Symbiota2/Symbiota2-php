import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {SuperAdminAvailablePermissionComponent} from './super-admin-available-permission.component';

describe('SuperAdminAvailablePermissionComponent', () => {
    let component: SuperAdminAvailablePermissionComponent;
    let fixture: ComponentFixture<SuperAdminAvailablePermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [SuperAdminAvailablePermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(SuperAdminAvailablePermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
