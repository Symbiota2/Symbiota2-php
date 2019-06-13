import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {CollectionCheckboxListComponent} from './collection-checkbox-list.component';

describe('CollectionCheckboxListComponent', () => {
    let component: CollectionCheckboxListComponent;
    let fixture: ComponentFixture<CollectionCheckboxListComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [CollectionCheckboxListComponent]
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(CollectionCheckboxListComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
