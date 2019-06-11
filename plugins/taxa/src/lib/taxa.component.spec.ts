import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TaxaComponent } from './taxa.component';

describe('TaxaComponent', () => {
  let component: TaxaComponent;
  let fixture: ComponentFixture<TaxaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TaxaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TaxaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
