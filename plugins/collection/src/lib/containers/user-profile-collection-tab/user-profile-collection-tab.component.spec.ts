import {async, ComponentFixture, TestBed} from '@angular/core/testing';

import {UserProfileCollectionTabComponent} from './user-profile-collection-tab.component';

describe('UserProfileCollectionTabComponent', () => {
    let component: UserProfileCollectionTabComponent;
    let fixture: ComponentFixture<UserProfileCollectionTabComponent>;

    beforeEach(async(() => {
        TestBed.configureTestingModule({
            declarations: [UserProfileCollectionTabComponent]
        })
            .compileComponents();
    }));

    beforeEach(() => {
        fixture = TestBed.createComponent(UserProfileCollectionTabComponent);
        component = fixture.componentInstance;
        fixture.detectChanges();
    });

    it('should create', () => {
        expect(component).toBeTruthy();
    });
});
