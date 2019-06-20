import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {PluginDependencyDialogComponent} from './plugin-dependency-dialog.component';

describe('PluginDependencyDialogComponent', () => {
    let component: PluginDependencyDialogComponent;
    let fixture: ComponentFixture<PluginDependencyDialogComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [PluginDependencyDialogComponent]
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(PluginDependencyDialogComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
