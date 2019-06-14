import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {SessionExpireWarningDialogComponent} from './session-expire-warning-dialog.component';

describe('SessionExpireWarningDialogComponent', () => {
    let component: SessionExpireWarningDialogComponent;
    let fixture: ComponentFixture<SessionExpireWarningDialogComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [SessionExpireWarningDialogComponent]
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(SessionExpireWarningDialogComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
