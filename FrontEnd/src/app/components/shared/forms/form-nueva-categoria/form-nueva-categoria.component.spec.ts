import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormNuevaCategoriaComponent } from './form-nueva-categoria.component';

describe('FormNuevaCategoriaComponent', () => {
  let component: FormNuevaCategoriaComponent;
  let fixture: ComponentFixture<FormNuevaCategoriaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FormNuevaCategoriaComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(FormNuevaCategoriaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
