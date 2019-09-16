import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PostagemPage } from './postagem.page';

describe('PostagemPage', () => {
  let component: PostagemPage;
  let fixture: ComponentFixture<PostagemPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PostagemPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PostagemPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
