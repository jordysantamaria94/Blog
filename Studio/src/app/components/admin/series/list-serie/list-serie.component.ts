import { Component, OnInit } from '@angular/core';
import { BlogService } from 'src/app/services/blog.service';
import * as moment from 'moment';
import { SeriesTable } from 'src/app/models/admin/series/list-series.model';

@Component({
  selector: 'app-list-serie',
  templateUrl: './list-serie.component.html',
  styleUrls: ['./list-serie.component.css']
})
export class ListSerieComponent implements OnInit {

  series: SeriesTable[] = [];

  currentPagination: number = 1;
  linksPagination: any = [];

  constructor(private blogService: BlogService) { }

  ngOnInit(): void {
    this.getAllSeries();
  }

  async getAllSeries() {
    await this.blogService.getAllSeries(this.currentPagination)
      .subscribe(series => {
        this.series = series['data'];
        this.currentPagination = series['current_page'];
        this.linksPagination = series['links'];
      });
  }

  paginate = (page: number) => {
    this.currentPagination = page;
    this.getAllSeries();
  }

  formatDate(date: string) : string {

    date = date.replace('T', ' ');
    date = date.replace('Z', ' ');
    date = moment(date).locale("es").format("dddd, DD MMMM YYYY");

    return date;
  }

}
