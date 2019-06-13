import {TestBed} from '@angular/core/testing';

import {SymbiotaSpatialService} from './symbiota-spatial.service';

describe('SymbiotaSpatialService', () => {
    beforeEach(() => TestBed.configureTestingModule({}));

    it('should be created', () => {
        const service: SymbiotaSpatialService = TestBed.get(SymbiotaSpatialService);
        expect(service).toBeTruthy();
    });
});
