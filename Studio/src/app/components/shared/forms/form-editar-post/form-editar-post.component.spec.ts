import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormEditarPostComponent } from './form-editar-post.component';

describe('FormEditarPostComponent', () => {
  let component: FormEditarPostComponent;
  let fixture: ComponentFixture<FormEditarPostComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FormEditarPostComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(FormEditarPostComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
