import { TestBed } from '@angular/core/testing';

import { OccurrenceService } from './occurrence.service';

describe('OccurrenceService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: OccurrenceService = TestBed.get(OccurrenceService);
    expect(service).toBeTruthy();
  });
});
