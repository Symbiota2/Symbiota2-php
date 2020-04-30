import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {UserPermissionsCurrentComponent} from './user-permissions-current.component';

describe('UserPermissionsCurrentComponent', () => {
    let component: UserPermissionsCurrentComponent;
    let fixture: ComponentFixture<UserPermissionsCurrentComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [UserPermissionsCurrentComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(UserPermissionsCurrentComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
