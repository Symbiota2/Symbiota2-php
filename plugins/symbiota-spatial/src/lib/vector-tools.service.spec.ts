import {TestBed} from '@angular/core/testing';

import {VectorToolsService} from './vector-tools.service';

describe('VectorToolsService', () => {
    beforeEach(() => TestBed.configureTestingModule({}));

    it('should be created', () => {
        const service: VectorToolsService = TestBed.get(VectorToolsService);
        expect(service).toBeTruthy();
    });
});
