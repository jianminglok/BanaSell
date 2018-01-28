import { TestBed, inject } from '@angular/core/testing';

import { LoginSharedService } from './login-shared.service';

describe('LoginSharedService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [LoginSharedService]
    });
  });

  it('should be created', inject([LoginSharedService], (service: LoginSharedService) => {
    expect(service).toBeTruthy();
  }));
});
