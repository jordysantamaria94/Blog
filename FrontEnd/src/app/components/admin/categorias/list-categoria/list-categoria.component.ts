import { Component, OnInit } from '@angular/core';
import { BlogService } from 'src/app/services/blog.service';
import * as moment from 'moment';
import { Router } from '@angular/router';
import { CategoriasTable } from 'src/app/models/admin/categorias/list-categorias.model';

@Component({
  selector: 'app-list-categoria',
  templateUrl: './list-categoria.component.html',
  styleUrls: ['./list-categoria.component.css']
})
export class ListCategoriaComponent implements OnInit {

  categorias: CategoriasTable[] = [] || undefined;

  currentPagination: number = 1;
  linksPagination: any = [];

  constructor(private blogService: BlogService, private route: Router) { }

  ngOnInit(): void {
    this.getAllCategorias();
  }

  async getAllCategorias() {
    
    try {

      await this.blogService.getAllCategorias(this.currentPagination)
        .subscribe(categorias => {
          this.categorias = categorias['data'];
          this.currentPagination = categorias['current_page'];
          this.linksPagination = categorias['links'];
        }, error => {
          console.log(error);
          localStorage.clear();
          this.route.navigate(['/']);
        });
      
    } catch (error) {
      console.log(error);
      localStorage.clear();
      this.route.navigate(['/']);
    }
  }

  paginate = (page: number): void => {
    this.currentPagination = page;
    this.getAllCategorias();
  }

  formatDate(date: string) : string {

    date = date.replace('T', ' ');
    date = date.replace('Z', ' ');
    date = moment(date).locale("es").format("dddd, DD MMMM YYYY");

    return date;
  }
}
