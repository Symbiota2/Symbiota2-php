import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {RareSpeciesReaderCurrentPermissionComponent} from './rare-species-reader-current-permission.component';

describe('RareSpeciesReaderCurrentPermissionComponent', () => {
    let component: RareSpeciesReaderCurrentPermissionComponent;
    let fixture: ComponentFixture<RareSpeciesReaderCurrentPermissionComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [RareSpeciesReaderCurrentPermissionComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(RareSpeciesReaderCurrentPermissionComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
