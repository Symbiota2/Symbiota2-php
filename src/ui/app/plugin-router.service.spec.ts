import {TestBed} from '@angular/core/testing';

import {PluginRouterService} from './plugin-router.service';

describe('PluginRouterService', () => {
    beforeEach(() => TestBed.configureTestingModule({}));

    it('should be created', () => {
        const service: PluginRouterService = TestBed.get(PluginRouterService);
        expect(service).toBeTruthy();
    });
});
