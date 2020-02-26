import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {SidepanelLinksComponent} from './sidepanel-links.component';

describe('SidepanelLinksComponent', () => {
    let component: SidepanelLinksComponent;
    let fixture: ComponentFixture<SidepanelLinksComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [SidepanelLinksComponent]
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(SidepanelLinksComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
