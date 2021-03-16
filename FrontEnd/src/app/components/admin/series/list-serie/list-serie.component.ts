import { Component, OnInit } from '@angular/core';
import { BlogService } from 'src/app/services/blog.service';
import * as moment from 'moment';

@Component({
  selector: 'app-list-serie',
  templateUrl: './list-serie.component.html',
  styleUrls: ['./list-serie.component.css']
})
export class ListSerieComponent implements OnInit {

  series: any = [];

  current: number = 1;
  links: any = [];

  constructor(private blogService: BlogService) { }

  ngOnInit(): void {
    this.getAllSeries();
  }

  async getAllSeries() {
    await this.blogService.getAllSeries(this.current)
      .subscribe(series => {
        this.series = series['data'];
        this.current = series['current_page'];
        this.links = series['links'];
      });
  }

  paginate = (page: number) => {
    this.current = page;
    this.getAllSeries();
  }

  formatDate(date: string) : string {

    date = date.replace('T', ' ');
    date = date.replace('Z', ' ');
    date = moment(date).locale("es").format("dddd, DD MMMM YYYY");

    return date;
  }

}
