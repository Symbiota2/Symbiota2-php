import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {ChecklistAvailablePermissionComponent} from './checklist-available-permission.component';

describe('ChecklistAvailablePermissionComponent', () => {
    let component: ChecklistAvailablePermissionComponent;
    let fixture: ComponentFixture<ChecklistAvailablePermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [ChecklistAvailablePermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(ChecklistAvailablePermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
