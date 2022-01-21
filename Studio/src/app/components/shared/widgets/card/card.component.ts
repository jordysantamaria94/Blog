import { Component, Input, OnInit } from '@angular/core';
import { environment } from 'src/environments/environment';

@Component({
  selector: 'app-card',
  templateUrl: './card.component.html',
  styleUrls: ['./card.component.css']
})
export class CardComponent implements OnInit {

  @Input() item: any;

  url: string;

  constructor() {}

  ngOnInit(): void {
    this.url = environment.urlRaw;
  }

}
