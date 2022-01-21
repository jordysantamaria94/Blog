import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AccordionAboutmeComponent } from './accordion-aboutme.component';

describe('AccordionAboutmeComponent', () => {
  let component: AccordionAboutmeComponent;
  let fixture: ComponentFixture<AccordionAboutmeComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AccordionAboutmeComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AccordionAboutmeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
