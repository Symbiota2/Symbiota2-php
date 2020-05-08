import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {CollectionAvailablePermissionComponent} from './collection-available-permission.component';

describe('CollectionAvailablePermissionComponent', () => {
    let component: CollectionAvailablePermissionComponent;
    let fixture: ComponentFixture<CollectionAvailablePermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [CollectionAvailablePermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(CollectionAvailablePermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
