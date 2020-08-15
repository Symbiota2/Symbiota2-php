import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SearchCriteriaPageComponent } from './search-criteria-page.component';

describe('SearchCriteriaPageComponent', () => {
  let component: SearchCriteriaPageComponent;
  let fixture: ComponentFixture<SearchCriteriaPageComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SearchCriteriaPageComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SearchCriteriaPageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
