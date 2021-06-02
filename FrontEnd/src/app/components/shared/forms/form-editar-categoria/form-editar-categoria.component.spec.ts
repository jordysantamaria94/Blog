import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormEditarCategoriaComponent } from './form-editar-categoria.component';

describe('FormEditarCategoriaComponent', () => {
  let component: FormEditarCategoriaComponent;
  let fixture: ComponentFixture<FormEditarCategoriaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FormEditarCategoriaComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(FormEditarCategoriaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
