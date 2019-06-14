import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {PluginAdminComponent} from './plugin-admin.component';

describe('PluginAdminComponent', () => {
    let component: PluginAdminComponent;
    let fixture: ComponentFixture<PluginAdminComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [PluginAdminComponent]
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(PluginAdminComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
