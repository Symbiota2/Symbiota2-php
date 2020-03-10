import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { UserMetadataComponent } from './user-metadata.component';

describe('UserMetadataComponent', () => {
  let component: UserMetadataComponent;
  let fixture: ComponentFixture<UserMetadataComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ UserMetadataComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(UserMetadataComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
