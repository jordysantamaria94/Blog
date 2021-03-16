import { Component, OnInit } from '@angular/core';
import { BlogService } from 'src/app/services/blog.service';
import * as moment from 'moment';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-list-post',
  templateUrl: './list-post.component.html',
  styleUrls: ['./list-post.component.css']
})
export class ListPostComponent implements OnInit {

  posts: any = [];

  current: number = 1;
  links: any = [];

  constructor(private blogService: BlogService) { }

  ngOnInit(): void {
    this.getAllPosts();
  }

  async getAllPosts() {
    await this.blogService.getAllPosts(this.current)
      .subscribe(posts => {
        this.posts = posts['data'];
        this.current = posts['current_page'];
        this.links = posts['links'];
      });
  }

  paginate = (page: number) => {
    this.current = page;
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
        console.log(response);
        this.posts.splice(index, 1);
      });

    Swal.fire(
      'Exito!',
      'El post, fue eliminado con exito!.',
      'success'
    )
  }

}
