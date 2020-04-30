import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {UserPermissionsAvailableComponent} from './user-permissions-available.component';

describe('UserPermissionsAvailableComponent', () => {
    let component: UserPermissionsAvailableComponent;
    let fixture: ComponentFixture<UserPermissionsAvailableComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [UserPermissionsAvailableComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(UserPermissionsAvailableComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
