import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {KeyCurrentPermissionComponent} from './key-current-permission.component';

describe('KeyCurrentPermissionComponent', () => {
    let component: KeyCurrentPermissionComponent;
    let fixture: ComponentFixture<KeyCurrentPermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [KeyCurrentPermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(KeyCurrentPermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
