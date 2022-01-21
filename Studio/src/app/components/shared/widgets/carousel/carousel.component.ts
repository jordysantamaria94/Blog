import { Component, Input, OnInit } from '@angular/core';
import { environment } from 'src/environments/environment';

@Component({
  selector: 'app-carousel',
  templateUrl: './carousel.component.html',
  styleUrls: ['./carousel.component.css']
})
export class CarouselComponent implements OnInit {

  @Input() news: any;
  url: string;

  constructor() {}

  ngOnInit(): void {
    this.url = environment.urlRaw;
  }

}
