import {TestBed} from '@angular/core/testing';

import {PluginComponentService} from './plugin-component.service';

describe('PluginComponentService', () => {
    beforeEach(() => TestBed.configureTestingModule({}));

    it('should be created', () => {
        const service: PluginComponentService = TestBed.get(PluginComponentService);
        expect(service).toBeTruthy();
    });
});
