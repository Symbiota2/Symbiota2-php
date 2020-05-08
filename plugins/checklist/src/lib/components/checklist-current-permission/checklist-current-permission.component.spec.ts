import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {ChecklistCurrentPermissionComponent} from './checklist-current-permission.component';

describe('ChecklistCurrentPermissionComponent', () => {
    let component: ChecklistCurrentPermissionComponent;
    let fixture: ComponentFixture<ChecklistCurrentPermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [ChecklistCurrentPermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(ChecklistCurrentPermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
