import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-pagination',
  templateUrl: './pagination.component.html',
  styleUrls: ['./pagination.component.css']
})
export class PaginationComponent implements OnInit {

  @Input() current: number;
  @Input() links: any;
  @Input() paginate: any;

  constructor() { }

  ngOnInit(): void {
  }

}
