import { TestBed } from '@angular/core/testing';

import { PluginLoaderService } from './plugin-loader.service';

describe('PluginLoaderService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: PluginLoaderService = TestBed.get(PluginLoaderService);
    expect(service).toBeTruthy();
  });
});
