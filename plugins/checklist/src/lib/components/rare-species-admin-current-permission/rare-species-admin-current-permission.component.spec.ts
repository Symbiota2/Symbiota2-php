import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {RareSpeciesAdminCurrentPermissionComponent} from './rare-species-admin-current-permission.component';

describe('RareSpeciesAdminCurrentPermissionComponent', () => {
    let component: RareSpeciesAdminCurrentPermissionComponent;
    let fixture: ComponentFixture<RareSpeciesAdminCurrentPermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [RareSpeciesAdminCurrentPermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(RareSpeciesAdminCurrentPermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
