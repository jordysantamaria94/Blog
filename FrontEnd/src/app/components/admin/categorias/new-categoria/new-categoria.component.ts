import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';
import { NuevaCategoriaModel } from 'src/app/models/admin/categorias/nueva-categoria.model';
import { BlogService } from 'src/app/services/blog.service';

@Component({
  selector: 'app-new-categoria',
  templateUrl: './new-categoria.component.html',
  styleUrls: ['./new-categoria.component.css']
})
export class NewCategoriaComponent implements OnInit {

  image: string;

  constructor(private blogService: BlogService, private toastr: ToastrService, private route: Router) {}

  ngOnInit(): void {
  }

  updateImage = (image: string): void => {
    this.image = image;
  }

  registrar = (sendForm: NgForm): void => {

    const postForm = new NuevaCategoriaModel(sendForm.value.titulo, this.image, sendForm.value.descripcion, sendForm.value.etiquetas);

    if (postForm.titulo != "" && 
      postForm.image && 
      postForm.descripcion != "" && 
      postForm.etiquetas != "") {

      let formData = new FormData();
      
      formData.append('id', localStorage.getItem("id"));
      formData.append('titulo', postForm.titulo);
      formData.append('File', postForm.image, postForm.image.name);
      formData.append('descripcion', postForm.descripcion);
      formData.append('etiquetas', postForm.etiquetas);

      this.blogService.setNewCategoria(formData)
        .subscribe(response => {
          if (response) {
            this.toastr.success("La categoria se ha registrado exitosamente", "Exito!");
            this.route.navigate(["/admin/categoria/list"]);
          } else {
            this.toastr.error("Hubo un error al tratar de registrar la categoria, intentalo nuevamente", "Error!");
          }
        }, error => {
          console.log(error);
          localStorage.clear();
          this.route.navigate(["/"]);
        });

    } else {
      this.toastr.warning("Es necesario llenar todos los campos", "Campos invalidos");
    }
  }

}
