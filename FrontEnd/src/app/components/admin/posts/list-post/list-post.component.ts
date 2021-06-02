import { Component, OnInit } from '@angular/core';
import { BlogService } from 'src/app/services/blog.service';
import * as moment from 'moment';
import Swal from 'sweetalert2';
import { Router } from '@angular/router';
import { PostsTable } from 'src/app/models/admin/posts/list-posts.model';

@Component({
  selector: 'app-list-post',
  templateUrl: './list-post.component.html',
  styleUrls: ['./list-post.component.css']
})
export class ListPostComponent implements OnInit {

  posts: PostsTable[] = [] || undefined;
  currentPagination: number = 1;
  linksPagination: any = [] || undefined;

  constructor(private blogService: BlogService, private router: Router) { }

  ngOnInit(): void {
    this.getAllPosts();
  }

  async getAllPosts() {
    
    try {
      
      await this.blogService.getAllPosts(this.currentPagination)
        .subscribe(posts => {
          this.posts = posts['data'];
          this.currentPagination = posts['current_page'];
          this.linksPagination = posts['links'];
        }, error => {
          localStorage.clear();
          this.router.navigate(['/']);
        });

    } catch (error) {
      localStorage.clear();
      this.router.navigate(['/']);
    }

  }

  paginate = (page: number) => {
    this.currentPagination = page;
    this.getAllPosts();
  }

  formatDate(date: string) : string {

    date = date.replace('T', ' ');
    date = date.replace('Z', ' ');
    date = moment(date).locale("es").format("dddd, DD MMMM YYYY");

    return date;
  }

  alertEliminar(id: number, index: number) {

    Swal.fire({
      title: '¿Seguro que quieres eliminarlo?',
      text: "Esta acción no se puede revertir",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminar!',
      cancelButtonText: 'No, cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        this.eliminar(id, index);
      }
    });
  }

  eliminar(id: number, index: number) {
    
    this.blogService.deletePost(id)
      .subscribe(response => {
        this.posts.splice(index, 1);
      });

    Swal.fire(
      'Exito!',
      'El post, fue eliminado con exito!.',
      'success'
    )
  }

}
