import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

import { map } from 'rxjs/operators';
import { environment } from 'src/environments/environment';

import { Login } from '../models/login';

@Injectable({
  providedIn: 'root'
})
export class BlogService {

  url: string;

  constructor(private http: HttpClient) {
    this.url = environment.urlApi;
  }

  getQuery(query:string) {
    const url = `${this.url}${ query }`;
    
    const headers = new HttpHeaders({
      'Authorization': `Bearer ${localStorage.getItem("token")}`
    });

    return this.http.get(url, { headers });
  }

  postQuery(query:string, data:any = null) {

    const headers = new HttpHeaders({
      'Authorization': `Bearer ${localStorage.getItem("token")}`
    });

    const url = `${this.url}${ query }`;

    return this.http.post(url, data, { headers });
  }

  putQuery(query:string, data:any = null) {

    const headers = new HttpHeaders({
      'Authorization': `Bearer ${localStorage.getItem("token")}`,
      'Content-Type': 'application/json'
    });
    const url = `${this.url}${ query }`;

    return this.http.put(url, data, { headers });
  }

  deleteQuery(query:string) {
    const headers = new HttpHeaders({
      'Authorization': `Bearer ${localStorage.getItem("token")}`
    });

    const url = `${this.url}${ query }`;

    return this.http.delete(url, { headers });
  }

  login(formData: Login) {
    return this.postQuery('login', formData);
  }

  verifyToken() {
    return this.getQuery('user');
  }

  getLastNews() {
    return this.getQuery('last-news');
  }

  getPostDetail(data: any) {
    return this.postQuery('post', data);
  }

  getPostsCategory(data: any) {
    return this.postQuery('categoria', data);
  }

  /**
   * Posts
   */

  getAllPosts(page : number) {
    return this.getQuery(`admin/posts?page=${page}`)
      .pipe( map(data => {
        return data['posts'];
      }));
  }

  getPrepareNewPost() {
    return this.getQuery('admin/posts/create');
  }

  setNewPost(data: any) {
    return this.postQuery('admin/posts', data);
  }

  getInfoPost(id: number) {
    return this.getQuery(`admin/posts/${id}/edit`)
      .pipe( map(data => {
        return data['post'];
      }));
  }

  updatePost(id: number, data: any) {
    return this.postQuery(`admin/posts/${id}?_method=PUT`, data);
  }

  deletePost(id: number) {
    return this.deleteQuery(`admin/posts/${id}`);
  }

  /**
   * Categorias
   */

   getAllCategorias(page : number) {
    return this.getQuery(`admin/categorias?page=${page}`)
      .pipe( map(data => {
        return data['categorias'];
      }));
  }

  getPrepareNewCategoria() {
    return this.getQuery('admin/categorias/create');
  }

  setNewCategoria(data: any) {
    return this.postQuery('admin/categorias', data);
  }

  getInfoCategoria(id: number) {
    return this.getQuery(`admin/categorias/${id}/edit`)
      .pipe( map(data => {
        return data['categoria'];
      }));
  }

  updateCategoria(id: number, data: any) {
    return this.postQuery(`admin/categorias/${id}?_method=PUT`, data);
  }

  /**
   * Subcategorias
   */

  getAllSeries(page : number) {
    return this.getQuery(`admin/series?page=${page}`)
      .pipe( map(data => {
        return data['series'];
      }));
  }

  getPrepareNewSerie() {
    return this.getQuery('admin/series/create');
  }

  setNewSerie(data: any) {
    return this.postQuery('admin/series', data);
  }

  getInfoSerie(id: number) {
    return this.getQuery(`admin/series/${id}/edit`)
      .pipe( map(data => {
        return data['serie'];
      }));
  }

  updateSerie(id: number, data: any) {
    return this.postQuery(`admin/series/${id}?_method=PUT`, data);
  }

  /**
   * Logout
   */

  logout() {
    return this.postQuery('logout');
  }

}
