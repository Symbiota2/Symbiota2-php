import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {PluginInstallerComponent} from './plugin-installer.component';

describe('PluginInstallerComponent', () => {
    let component: PluginInstallerComponent;
    let fixture: ComponentFixture<PluginInstallerComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [PluginInstallerComponent],
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(PluginInstallerComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
