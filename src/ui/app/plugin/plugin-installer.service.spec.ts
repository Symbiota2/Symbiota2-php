import {TestBed} from '@angular/core/testing';

import {PluginInstallerService} from './plugin-installer.service';

describe('PluginInstallerService', () => {
    beforeEach(() => TestBed.configureTestingModule({}));

    it('should be created', () => {
        const service: PluginInstallerService = TestBed.get(PluginInstallerService);
        expect(service).toBeTruthy();
    });
});
