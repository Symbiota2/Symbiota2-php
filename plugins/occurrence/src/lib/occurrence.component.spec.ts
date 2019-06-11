import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { OccurrenceComponent } from './occurrence.component';

describe('OccurrenceComponent', () => {
  let component: OccurrenceComponent;
  let fixture: ComponentFixture<OccurrenceComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ OccurrenceComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(OccurrenceComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
