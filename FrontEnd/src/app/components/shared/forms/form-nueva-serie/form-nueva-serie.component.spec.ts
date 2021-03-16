import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormNuevaSerieComponent } from './form-nueva-serie.component';

describe('FormNuevaSerieComponent', () => {
  let component: FormNuevaSerieComponent;
  let fixture: ComponentFixture<FormNuevaSerieComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FormNuevaSerieComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(FormNuevaSerieComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
