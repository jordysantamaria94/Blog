import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { ToastrModule } from 'ngx-toastr';
import { CKEditorModule } from 'ckeditor4-angular';

import { AppComponent } from './app.component';
import { MainComponent } from './components/main/main.component';
import { ContactoComponent } from './components/contacto/contacto.component';
import { BlogComponent } from './components/blog/blog.component';
import { CursosComponent } from './components/cursos/cursos.component';
import { GameplayComponent } from './components/gameplay/gameplay.component';
import { BuscadorComponent } from './components/buscador/buscador.component';
import { LoginComponent } from './components/login/login.component';
import { NewPostComponent } from './components/admin/posts/new-post/new-post.component';
import { UpdatePostComponent } from './components/admin/posts/update-post/update-post.component';
import { NewCategoriaComponent } from './components/admin/categorias/new-categoria/new-categoria.component';
import { UpdateCategoriaComponent } from './components/admin/categorias/update-categoria/update-categoria.component';
import { ListCategoriaComponent } from './components/admin/categorias/list-categoria/list-categoria.component';
import { ListPostComponent } from './components/admin/posts/list-post/list-post.component';
import { NewSerieComponent } from './components/admin/series/new-serie/new-serie.component';
import { UpdateSerieComponent } from './components/admin/series/update-serie/update-serie.component';
import { ListSerieComponent } from './components/admin/series/list-serie/list-serie.component';
import { AppRoutingModule } from './app-routing.module';
import { PostComponent } from './components/post/post.component';
import { NavbarComponent } from './components/shared/navbar/navbar.component';
import { CarouselComponent } from './components/shared/widgets/carousel/carousel.component';
import { CardComponent } from './components/shared/widgets/card/card.component';
import { ListGroupComponent } from './components/shared/widgets/list-group/list-group.component';
import { CardOverlayComponent } from './components/shared/widgets/card-overlay/card-overlay.component';
import { NavComponent } from './components/shared/widgets/nav/nav.component';
import { SearchComponent } from './components/shared/widgets/search/search.component';
import { AccordionAboutmeComponent } from './components/shared/widgets/accordion-aboutme/accordion-aboutme.component';
import { FooterComponent } from './components/shared/footer/footer.component';
import { ListGroupAdminComponent } from './components/shared/widgets/admin/list-group-admin/list-group-admin.component';
import { FilterSeriePipe } from './pipes/filter-serie.pipe';
import { FormNuevoPostComponent } from './components/shared/forms/form-nuevo-post/form-nuevo-post.component';
import { PaginationComponent } from './components/shared/widgets/pagination/pagination.component';
import { FormNuevaCategoriaComponent } from './components/shared/forms/form-nueva-categoria/form-nueva-categoria.component';
import { FormNuevaSerieComponent } from './components/shared/forms/form-nueva-serie/form-nueva-serie.component';

@NgModule({
  declarations: [
    AppComponent,
    MainComponent,
    ContactoComponent,
    BlogComponent,
    CursosComponent,
    GameplayComponent,
    BuscadorComponent,
    LoginComponent,
    NewPostComponent,
    UpdatePostComponent,
    NewCategoriaComponent,
    UpdateCategoriaComponent,
    ListCategoriaComponent,
    ListPostComponent,
    NewSerieComponent,
    UpdateSerieComponent,
    ListSerieComponent,
    PostComponent,
    NavbarComponent,
    CarouselComponent,
    CardComponent,
    ListGroupComponent,
    CardOverlayComponent,
    NavComponent,
    SearchComponent,
    AccordionAboutmeComponent,
    FooterComponent,
    ListGroupAdminComponent,
    FilterSeriePipe,
    FormNuevoPostComponent,
    PaginationComponent,
    FormNuevaCategoriaComponent,
    FormNuevaSerieComponent
  ],
  imports: [
    CKEditorModule,
    HttpClientModule,
    FormsModule,
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    ToastrModule.forRoot()
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
