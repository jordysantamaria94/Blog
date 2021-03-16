import { Component, OnInit } from '@angular/core';
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

  nuevaCategoriaModel: NuevaCategoriaModel;

  constructor(private blogService: BlogService, private toastr: ToastrService, private route: Router) { 
    this.nuevaCategoriaModel = new NuevaCategoriaModel();
  }

  ngOnInit(): void {
  }

  registrar = () => {
    if (this.nuevaCategoriaModel.titulo != "" && 
      this.nuevaCategoriaModel.image && 
      this.nuevaCategoriaModel.descripcion != "" && 
      this.nuevaCategoriaModel.etiquetas != "") {

      let formData = new FormData();
      
      formData.append('id', localStorage.getItem("id"));
      formData.append('titulo', this.nuevaCategoriaModel.titulo);
      formData.append('File', this.nuevaCategoriaModel.image, this.nuevaCategoriaModel.image.name);
      formData.append('descripcion', this.nuevaCategoriaModel.descripcion);
      formData.append('etiquetas', this.nuevaCategoriaModel.etiquetas);

      this.blogService.setNewCategoria(formData)
        .subscribe(response => {
          if (response) {
            this.toastr.success("La categoria se ha registrado exitosamente", "Exito!");
            this.route.navigate(["/admin/categoria/list"]);
          } else {
            this.toastr.error("Hubo un error al tratar de registrar la categoria, intentalo nuevamente", "Error!");
          }
        });

    } else {
      this.toastr.warning("Es necesario llenar todos los campos", "Campos invalidos");
    }
  }

}
