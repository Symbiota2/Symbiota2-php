import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {CollectionCurrentPermissionComponent} from './collection-current-permission.component';

describe('CollectionCurrentPermissionComponent', () => {
    let component: CollectionCurrentPermissionComponent;
    let fixture: ComponentFixture<CollectionCurrentPermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [CollectionCurrentPermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(CollectionCurrentPermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
