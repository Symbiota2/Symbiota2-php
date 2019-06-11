import { TestBed } from '@angular/core/testing';

import { SpatialService } from './spatial.service';

describe('SpatialService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: SpatialService = TestBed.get(SpatialService);
    expect(service).toBeTruthy();
  });
});
