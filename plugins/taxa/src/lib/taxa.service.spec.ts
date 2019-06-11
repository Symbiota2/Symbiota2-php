import {TestBed} from '@angular/core/testing';

import {TaxaService} from './taxa.service';

describe('TaxaService', () => {
    beforeEach(() => TestBed.configureTestingModule({}));

    it('should be created', () => {
        const service: TaxaService = TestBed.get(TaxaService);
        expect(service).toBeTruthy();
    });
});
