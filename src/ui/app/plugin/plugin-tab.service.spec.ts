import {TestBed} from '@angular/core/testing';

import {PluginTabService} from './plugin-tab.service';

describe('PluginTabService', () => {
    beforeEach(() => TestBed.configureTestingModule({}));

    it('should be created', () => {
        const service: PluginTabService = TestBed.get(PluginTabService);
        expect(service).toBeTruthy();
    });
});
