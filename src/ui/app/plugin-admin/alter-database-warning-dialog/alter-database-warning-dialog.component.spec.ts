import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {AlterDatabaseWarningDialogComponent} from './alter-database-warning-dialog.component';

describe('AlterDatabaseWarningDialogComponent', () => {
    let component: AlterDatabaseWarningDialogComponent;
    let fixture: ComponentFixture<AlterDatabaseWarningDialogComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [AlterDatabaseWarningDialogComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(AlterDatabaseWarningDialogComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
