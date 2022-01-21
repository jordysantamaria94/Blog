import { Component, OnInit } from '@angular/core';
import { BlogService } from 'src/app/services/blog.service';

@Component({
  selector: 'app-gameplay',
  templateUrl: './gameplay.component.html',
  styleUrls: ['./gameplay.component.css']
})
export class GameplayComponent implements OnInit {

  posts: any = [];
  news: any = [];
  series: any = [];

  constructor(private blogService: BlogService) {
    this.getPostsGameplays();
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

  getPostsGameplays() {

    const data = {
      id: 3
    };

    this.blogService.getPostsCategory(data)
      .subscribe(gameplay=> {
        this.posts = gameplay['posts'];
        this.series = gameplay['subcategorias'];
        this.setNews();
      });
  }

}
