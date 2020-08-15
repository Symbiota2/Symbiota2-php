import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CollectionSelectPageComponent } from './collection-select-page.component';

describe('CollectionSelectPageComponent', () => {
  let component: CollectionSelectPageComponent;
  let fixture: ComponentFixture<CollectionSelectPageComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CollectionSelectPageComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CollectionSelectPageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
