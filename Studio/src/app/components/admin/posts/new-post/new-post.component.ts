import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';
import { NuevoPostModel } from 'src/app/models/admin/posts/nuevo-post.model';
import { BlogService } from 'src/app/services/blog.service';

@Component({
  selector: 'app-new-post',
  templateUrl: './new-post.component.html',
  styleUrls: ['./new-post.component.css']
})
export class NewPostComponent implements OnInit {

  image: string;

  constructor(private blogService: BlogService, private toastr: ToastrService, private route: Router) {}

  ngOnInit(): void {
  }

  updateImage = (image: string): void => {
    this.image = image;
  }

  registrar = (sendForm: NgForm): void => {

    const postForm = new NuevoPostModel(sendForm.value.categoria, sendForm.value.serie, sendForm.value.titulo, sendForm.value.url, this.image, sendForm.value.descripcionPortada, sendForm.value.descripcionCorta, sendForm.value.content, sendForm.value.etiquetas);

    try {
      
      if (postForm.categoria != 0 && 
          postForm.serie != 0 && 
          postForm.titulo != "" && 
          postForm.url != "" && 
          postForm.image && 
          postForm.descripcionPortada != "" && 
          postForm.descripcionCorta != "" && 
          postForm.content != "" && 
          postForm.etiquetas != "") {

          let formData = new FormData();
          
          formData.append('id', localStorage.getItem("id"));
          formData.append('serie', postForm.serie.toString());
          formData.append('titulo', postForm.titulo);
          formData.append('url', postForm.url);
          formData.append('File', postForm.image, postForm.image.name);
          formData.append('descripcionPortada', postForm.descripcionPortada);
          formData.append('descripcionCorta', postForm.descripcionCorta);
          formData.append('content', postForm.content);
          formData.append('etiquetas', postForm.etiquetas);

          this.blogService.setNewPost(formData)
            .subscribe(response => {
              if (response) {
                this.toastr.success("El post se ha registrado exitosamente", "Exito!");
                this.route.navigate(["/admin/posts/list"]);
              } else {
                this.toastr.error("Hubo un error al tratar de registrar el post, intentalo nuevamente", "Error!");
              }
            }, error => {
              console.log(error);
              localStorage.clear();
              this.route.navigate(["/"]);
            });

        } else {
          this.toastr.warning("Es necesario llenar todos los campos", "Campos invalidos");
        }

    } catch (error) {
      console.log(error);
    }
  }

}
