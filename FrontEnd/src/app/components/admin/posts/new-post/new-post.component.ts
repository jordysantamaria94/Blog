import { Component, OnInit } from '@angular/core';
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

  nuevoPostModel: NuevoPostModel;

  constructor(private blogService: BlogService, private toastr: ToastrService, private route: Router) {
    this.nuevoPostModel = new NuevoPostModel();
  }

  ngOnInit(): void {
  }

  registrar = () => {

    if (this.nuevoPostModel.categoria != 0 && 
        this.nuevoPostModel.serie != 0 && 
        this.nuevoPostModel.titulo != "" && 
        this.nuevoPostModel.url != "" && 
        this.nuevoPostModel.image && 
        this.nuevoPostModel.descripcionPortada != "" && 
        this.nuevoPostModel.descripcionCorta != "" && 
        this.nuevoPostModel.content != "" && 
        this.nuevoPostModel.etiquetas != "") {

      let formData = new FormData();
      
      formData.append('id', localStorage.getItem("id"));
      formData.append('serie', this.nuevoPostModel.serie.toString());
      formData.append('titulo', this.nuevoPostModel.titulo);
      formData.append('url', this.nuevoPostModel.url);
      formData.append('File', this.nuevoPostModel.image, this.nuevoPostModel.image.name);
      formData.append('descripcionPortada', this.nuevoPostModel.descripcionPortada);
      formData.append('descripcionCorta', this.nuevoPostModel.descripcionCorta);
      formData.append('content', this.nuevoPostModel.content);
      formData.append('etiquetas', this.nuevoPostModel.etiquetas);

      this.blogService.setNewPost(formData)
        .subscribe(response => {
          if (response) {
            this.toastr.success("El post se ha registrado exitosamente", "Exito!");
            this.route.navigate(["/admin/posts/list"]);
          } else {
            this.toastr.error("Hubo un error al tratar de registrar el post, intentalo nuevamente", "Error!");
          }
        });

    } else {
      this.toastr.warning("Es necesario llenar todos los campos", "Campos invalidos");
    }
  }

}
