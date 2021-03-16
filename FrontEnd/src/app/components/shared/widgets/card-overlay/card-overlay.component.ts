import { Component, Input, OnInit } from '@angular/core';
import { environment } from 'src/environments/environment';

@Component({
  selector: 'app-card-overlay',
  templateUrl: './card-overlay.component.html',
  styleUrls: ['./card-overlay.component.css']
})
export class CardOverlayComponent implements OnInit {

  @Input() item: any;

  url: string;

  constructor() {}

  ngOnInit(): void {
    this.url = environment.urlRaw;
  }

}
