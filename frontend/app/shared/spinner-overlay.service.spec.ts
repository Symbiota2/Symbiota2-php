import { TestBed } from '@angular/core/testing';

import { SpinnerOverlayService } from './spinner-overlay.service';

describe('SpinnerOverlayService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: SpinnerOverlayService = TestBed.get(SpinnerOverlayService);
    expect(service).toBeTruthy();
  });
});
