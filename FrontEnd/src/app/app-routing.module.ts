import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';


import { MainComponent } from './components/main/main.component';
import { BlogComponent } from './components/blog/blog.component';
import { CursosComponent } from './components/cursos/cursos.component';
import { GameplayComponent } from './components/gameplay/gameplay.component';
import { ContactoComponent } from './components/contacto/contacto.component';
import { BuscadorComponent } from './components/buscador/buscador.component';
import { LoginComponent } from './components/login/login.component';
import { PostComponent } from './components/post/post.component';

// Admin
import { ListPostComponent } from './components/admin/posts/list-post/list-post.component';
import { NewPostComponent } from './components/admin/posts/new-post/new-post.component';
import { UpdatePostComponent } from './components/admin/posts/update-post/update-post.component';

import { ListCategoriaComponent } from './components/admin/categorias/list-categoria/list-categoria.component';
import { NewCategoriaComponent } from './components/admin/categorias/new-categoria/new-categoria.component';
import { UpdateCategoriaComponent } from './components/admin/categorias/update-categoria/update-categoria.component';

import { ListSerieComponent } from './components/admin/series/list-serie/list-serie.component';
import { NewSerieComponent } from './components/admin/series/new-serie/new-serie.component';
import { UpdateSerieComponent } from './components/admin/series/update-serie/update-serie.component';


const routes: Routes = [
  { path: '', component: MainComponent },
  { path: 'blog', component: BlogComponent },
  { path: 'cursos', component: CursosComponent },
  { path: 'gameplay', component: GameplayComponent },
  { path: 'contactame', component: ContactoComponent },
  { path: 'search', component: BuscadorComponent },
  { path: 'login', component: LoginComponent },
  { path: 'post/:id/:url', component: PostComponent },
  // Admin
  { path: 'admin/posts/list', component: ListPostComponent },
  { path: 'admin/posts/new', component: NewPostComponent },
  { path: 'admin/posts/update/:id', component: UpdatePostComponent },
  { path: 'admin/categoria/list', component: ListCategoriaComponent },
  { path: 'admin/categoria/new', component: NewCategoriaComponent },
  { path: 'admin/categoria/update/:id', component: UpdateCategoriaComponent },
  { path: 'admin/serie/list', component: ListSerieComponent },
  { path: 'admin/serie/new', component: NewSerieComponent },
  { path: 'admin/serie/update/:id', component: UpdateSerieComponent },
  // Restrictions
  { path: '**', pathMatch: 'full', redirectTo: '' }
];

@NgModule({
  declarations: [],
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
