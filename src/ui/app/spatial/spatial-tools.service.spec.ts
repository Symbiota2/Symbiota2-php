import {TestBed} from '@angular/core/testing';

import {SpatialToolsService} from './spatial-tools.service';

describe('SpatialToolsService', () => {
    beforeEach(() => TestBed.configureTestingModule({}));

    it('should be created', () => {
        const service: SpatialToolsService = TestBed.get(SpatialToolsService);
        expect(service).toBeTruthy();
    });
});
