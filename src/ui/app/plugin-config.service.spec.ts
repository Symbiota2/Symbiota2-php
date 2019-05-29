import {TestBed} from '@angular/core/testing';

import {PluginConfigService} from './plugin-config.service';

describe('PluginConfigService', () => {
    beforeEach(() => TestBed.configureTestingModule({}));

    it('should be created', () => {
        const service: PluginConfigService = TestBed.get(PluginConfigService);
        expect(service).toBeTruthy();
    });
});
