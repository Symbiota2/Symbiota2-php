import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {KeyAvailablePermissionComponent} from './key-available-permission.component';

describe('KeyAvailablePermissionComponent', () => {
    let component: KeyAvailablePermissionComponent;
    let fixture: ComponentFixture<KeyAvailablePermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [KeyAvailablePermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(KeyAvailablePermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
