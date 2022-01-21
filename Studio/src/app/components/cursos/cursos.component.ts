import { Component, OnInit } from '@angular/core';
import { BlogService } from 'src/app/services/blog.service';

@Component({
  selector: 'app-cursos',
  templateUrl: './cursos.component.html',
  styleUrls: ['./cursos.component.css']
})
export class CursosComponent implements OnInit {

  posts: any = [];
  news: any = [];
  series: any = [];

  constructor(private blogService: BlogService) {
    this.getPostsCursos();
  }

  ngOnInit(): void {
  }

  setNews() {
    this.posts.map(post => {
      if (this.news.length <= 2) {
        this.news.push(post);
      }
    });
  }

  getPostsCursos() {

    const data = {
      id: 2
    };

    this.blogService.getPostsCategory(data)
      .subscribe(curso => {
        this.posts = curso['posts'];
        this.series = curso['subcategorias'];
        this.setNews();
      });
  }

}
