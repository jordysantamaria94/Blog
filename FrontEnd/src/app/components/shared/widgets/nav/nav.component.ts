import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-nav',
  templateUrl: './nav.component.html',
  styleUrls: ['./nav.component.css']
})
export class NavComponent implements OnInit {

  @Input() cursos: any = [];
  @Input() gameplays: any = [];
  @Input() vlogs: any = [];

  constructor() { }

  ngOnInit(): void {
  }

}
