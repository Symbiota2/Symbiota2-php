import {TestBed} from '@angular/core/testing';

import {SharedToolsService} from './shared-tools.service';

describe('SharedToolsService', () => {
    beforeEach(() => TestBed.configureTestingModule({}));

    it('should be created', () => {
        const service: SharedToolsService = TestBed.get(SharedToolsService);
        expect(service).toBeTruthy();
    });
});
