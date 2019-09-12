import { TestBed } from '@angular/core/testing';

import { UsuariosHttpService } from './usuarios-http.service';

describe('UsuariosHttpService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: UsuariosHttpService = TestBed.get(UsuariosHttpService);
    expect(service).toBeTruthy();
  });
});
