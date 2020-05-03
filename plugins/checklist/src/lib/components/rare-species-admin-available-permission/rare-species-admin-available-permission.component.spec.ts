import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {RareSpeciesAdminAvailablePermissionComponent} from './rare-species-admin-available-permission.component';

describe('RareSpeciesAdminAvailablePermissionComponent', () => {
    let component: RareSpeciesAdminAvailablePermissionComponent;
    let fixture: ComponentFixture<RareSpeciesAdminAvailablePermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [RareSpeciesAdminAvailablePermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(RareSpeciesAdminAvailablePermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
