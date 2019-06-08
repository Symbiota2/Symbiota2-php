import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {PluginOutletComponent} from './plugin-outlet.component';

describe('PluginOutletComponent', () => {
    let component: PluginOutletComponent;
    let fixture: ComponentFixture<PluginOutletComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [PluginOutletComponent]
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(PluginOutletComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
