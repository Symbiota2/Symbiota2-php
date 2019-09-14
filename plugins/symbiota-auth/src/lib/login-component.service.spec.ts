import {TestBed} from '@angular/core/testing';

import {LoginComponentService} from './login-component.service';

describe('LoginComponentService', () => {
    beforeEach(() => TestBed.configureTestingModule({}));

    it('should be created', () => {
        const service: LoginComponentService = TestBed.get(LoginComponentService);
        expect(service).toBeTruthy();
    });
});
