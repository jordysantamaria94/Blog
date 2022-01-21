import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { BlogService } from 'src/app/services/blog.service';
import { environment } from 'src/environments/environment';
import * as moment from 'moment';
import { Metas } from 'src/app/helpers/metas';
import { Title } from '@angular/platform-browser';

@Component({
  selector: 'app-post',
  templateUrl: './post.component.html',
  styleUrls: ['./post.component.css']
})
export class PostComponent implements OnInit {

  url: string;
  post: any;
  date: string;
  recommendations: any;

  constructor(private blogService: BlogService, private route: ActivatedRoute, private metas: Metas, private router: Router, private title: Title) {
  }

  ngOnInit(): void {
    this.route.params.subscribe(param => {
      this.getPostDetail(param.id);
    });
  }

  ngOnChange(): void {
    console.log("Hello");
  }

  async getPostDetail(id: string) {

    const data = {
      id: id
    };

    await this.blogService.getPostDetail(data)
      .subscribe(post => {
        console.log(post);
        this.url = environment.urlRaw;
        this.post = post['detail'];
        this.recommendations = post['recommendations'];
        this.date = moment(post['detail']['created_at']).format('dddd, d MMM YYYY');
        this.setMetas();
      });
  }

  async setMetas() {

    const metasCustom = {
      title: this.post.titulo,
      description: this.post.breve_descripcion,
      robots: 'index, follow',
      url: window.location.hostname + this.router.url,
      image: this.url+'/images/posts/'+this.post.id+'.jpg',
      keywords: JSON.parse(this.post.etiquetas),
      type: 'article',
      date: this.post.created_at
    };

    this.title.setTitle(this.post.titulo);

    await this.metas.updateMetaTags(metasCustom);

  }

}
