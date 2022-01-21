import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormNuevoPostComponent } from './form-nuevo-post.component';

describe('FormNuevoPostComponent', () => {
  let component: FormNuevoPostComponent;
  let fixture: ComponentFixture<FormNuevoPostComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FormNuevoPostComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(FormNuevoPostComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
