import {TestBed} from '@angular/core/testing';

import {MapProviderService} from './map-provider.service';

describe('MapProviderService', () => {
    beforeEach(() => TestBed.configureTestingModule({}));

    it('should be created', () => {
        const service: MapProviderService = TestBed.get(MapProviderService);
        expect(service).toBeTruthy();
    });
});
