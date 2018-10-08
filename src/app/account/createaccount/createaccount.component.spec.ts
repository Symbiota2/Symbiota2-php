import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CreateaccountComponent } from './createaccount.component';

describe('CreateaccountComponent', () => {
  let component: CreateaccountComponent;
  let fixture: ComponentFixture<CreateaccountComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CreateaccountComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CreateaccountComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
