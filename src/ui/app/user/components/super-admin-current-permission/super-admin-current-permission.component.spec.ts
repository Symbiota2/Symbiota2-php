import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {SuperAdminCurrentPermissionComponent} from './super-admin-current-permission.component';

describe('SuperAdminCurrentPermissionComponent', () => {
    let component: SuperAdminCurrentPermissionComponent;
    let fixture: ComponentFixture<SuperAdminCurrentPermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [SuperAdminCurrentPermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(SuperAdminCurrentPermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
