import {TestBed} from '@angular/core/testing';

import {SharedUserService} from './shared-user.service';

describe('SharedUserService', () => {
    beforeEach(() => TestBed.configureTestingModule({}));

    it('should be created', () => {
        const service: SharedUserService = TestBed.get(SharedUserService);
        expect(service).toBeTruthy();
    });
});
