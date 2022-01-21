import { Component, OnInit } from '@angular/core';
import { Metas } from 'src/app/helpers/metas';
import { BlogService } from 'src/app/services/blog.service';
import * as moment from 'moment';
import { Title } from '@angular/platform-browser';

@Component({
  selector: 'app-main',
  templateUrl: './main.component.html',
  styleUrls: ['./main.component.css']
})

export class MainComponent implements OnInit {

  postsJumbotron: any = [];
  postsCursos: any = [];
  postsGameplays: any = [];
  postsVlogs: any = [];
  subcategorias: any = [];

  constructor(private blogService: BlogService, private metas: Metas, private title: Title) {
    this.getLastNewsJumbotron();
    this.setMetas();
  }

  ngOnInit(): void {}

  getLastNewsJumbotron() {
    this.blogService.getLastNews()
      .subscribe(news => {
        console.log(news);
        this.postsJumbotron = news['posts'];
        this.postsCursos = news['cursos'];
        this.postsGameplays = news['gameplays'];
        this.postsVlogs = news['vlogs'];
        this.subcategorias = news['subcategorias'];
      });
  }

  setMetas() {

    const metasCustom = {
      title: 'Jordy Santamaria',
      description: 'Bienvenido a mi sitio personal, aqui encontraras cursos / tutoriales, gameplays que hago para mis canales de YouTube y pequeños posts acerca de mi vida personal',
      robots: 'index, follow',
      url: window.location.hostname,
      image: 'https://www.jordysantamaria.com/img/logo/wallpaper.jpg',
      keywords: 'blog, gameplay, vlog, cursos, tutoriales, courses, videojuegos',
      type: 'article',
      date: moment().format()
    };

    this.title.setTitle("Jordy Santamaria");

    this.metas.addMetaTags(metasCustom);

  }

}
