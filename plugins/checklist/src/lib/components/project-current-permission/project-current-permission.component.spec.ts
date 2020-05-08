import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {ProjectCurrentPermissionComponent} from './project-current-permission.component';

describe('ProjectCurrentPermissionComponent', () => {
    let component: ProjectCurrentPermissionComponent;
    let fixture: ComponentFixture<ProjectCurrentPermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [ProjectCurrentPermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(ProjectCurrentPermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
