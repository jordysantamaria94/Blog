import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormEditarSerieComponent } from './form-editar-serie.component';

describe('FormEditarSerieComponent', () => {
  let component: FormEditarSerieComponent;
  let fixture: ComponentFixture<FormEditarSerieComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FormEditarSerieComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(FormEditarSerieComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
