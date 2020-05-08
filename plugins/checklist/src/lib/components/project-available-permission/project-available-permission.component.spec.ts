import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {ProjectAvailablePermissionComponent} from './project-available-permission.component';

describe('ProjectAvailablePermissionComponent', () => {
    let component: ProjectAvailablePermissionComponent;
    let fixture: ComponentFixture<ProjectAvailablePermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [ProjectAvailablePermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(ProjectAvailablePermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
