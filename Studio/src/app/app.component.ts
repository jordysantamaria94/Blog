import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
import { Metas } from './helpers/metas';
import * as moment from 'moment';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {

  constructor(private metas: Metas, private title: Title) {}

  ngOnInit() {
    this.setMetas();
  }

  async setMetas() {

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

    await this.metas.addMetaTags(metasCustom);

  }
}
