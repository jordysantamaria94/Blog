import { Component, OnInit } from '@angular/core';
import { BlogService } from 'src/app/services/blog.service';
import * as moment from 'moment';

@Component({
  selector: 'app-list-categoria',
  templateUrl: './list-categoria.component.html',
  styleUrls: ['./list-categoria.component.css']
})
export class ListCategoriaComponent implements OnInit {

  categorias: any = [];

  current: number = 1;
  links: any = [];

  constructor(private blogService: BlogService) { }

  ngOnInit(): void {
    this.getAllCategorias();
  }

  async getAllCategorias() {
    await this.blogService.getAllCategorias(this.current)
      .subscribe(categorias => {
        this.categorias = categorias['data'];
        this.current = categorias['current_page'];
        this.links = categorias['links'];
      });
  }

  paginate = (page: number) => {
    this.current = page;
    this.getAllCategorias();
  }

  formatDate(date: string) : string {

    date = date.replace('T', ' ');
    date = date.replace('Z', ' ');
    date = moment(date).locale("es").format("dddd, DD MMMM YYYY");

    return date;
  }
}
