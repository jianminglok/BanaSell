import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AdSubmitComponent } from './ad-submit.component';

describe('AdSubmitComponent', () => {
  let component: AdSubmitComponent;
  let fixture: ComponentFixture<AdSubmitComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AdSubmitComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AdSubmitComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
