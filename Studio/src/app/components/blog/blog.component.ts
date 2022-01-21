import { Component, OnInit } from '@angular/core';
import { BlogService } from 'src/app/services/blog.service';

@Component({
  selector: 'app-blog',
  templateUrl: './blog.component.html',
  styleUrls: ['./blog.component.css']
})
export class BlogComponent implements OnInit {

  posts: any = [];
  news: any = [];
  series: any = [];

  constructor(private blogService: BlogService) {
    this.getPostsVlog();
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

  getPostsVlog() {

    const data = {
      id: 1
    };

    this.blogService.getPostsCategory(data)
      .subscribe(vlogs => {
        console.log(vlogs);
        this.posts = vlogs['posts'];
        this.series = vlogs['subcategorias'];
        this.setNews();
      });
  }

}
