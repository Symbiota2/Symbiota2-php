import { TestBed } from '@angular/core/testing';

import { OccurrenceSearchService } from './occurrence-search.service';

describe('OccurrenceSearchService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: OccurrenceSearchService = TestBed.get(OccurrenceSearchService);
    expect(service).toBeTruthy();
  });
});
