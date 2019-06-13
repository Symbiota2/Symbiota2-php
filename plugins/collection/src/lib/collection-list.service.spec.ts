import {TestBed} from '@angular/core/testing';

import {CollectionListService} from './collection-list.service';

describe('CollectionListService', () => {
    beforeEach(() => TestBed.configureTestingModule({}));

    it('should be created', () => {
        const service: CollectionListService = TestBed.get(CollectionListService);
        expect(service).toBeTruthy();
    });
});
