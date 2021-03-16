import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListGroupAdminComponent } from './list-group-admin.component';

describe('ListGroupAdminComponent', () => {
  let component: ListGroupAdminComponent;
  let fixture: ComponentFixture<ListGroupAdminComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ListGroupAdminComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ListGroupAdminComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
