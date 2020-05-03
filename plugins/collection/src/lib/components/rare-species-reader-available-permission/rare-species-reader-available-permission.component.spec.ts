import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {RareSpeciesReaderAvailablePermissionComponent} from './rare-species-reader-available-permission.component';

describe('RareSpeciesReaderAvailablePermissionComponent', () => {
    let component: RareSpeciesReaderAvailablePermissionComponent;
    let fixture: ComponentFixture<RareSpeciesReaderAvailablePermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [RareSpeciesReaderAvailablePermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(RareSpeciesReaderAvailablePermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
