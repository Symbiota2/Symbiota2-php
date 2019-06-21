import {TestBed} from '@angular/core/testing';

import {PluginLinkService} from './plugin-link.service';

describe('PluginLinkService', () => {
    beforeEach(() => TestBed.configureTestingModule({}));

    it('should be created', () => {
        const service: PluginLinkService = TestBed.get(PluginLinkService);
        expect(service).toBeTruthy();
    });
});
