import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';
import { NuevaCategoriaModel } from 'src/app/models/admin/categorias/nueva-categoria.model';
import { BlogService } from 'src/app/services/blog.service';

@Component({
  selector: 'app-update-categoria',
  templateUrl: './update-categoria.component.html',
  styleUrls: ['./update-categoria.component.css']
})
export class UpdateCategoriaComponent implements OnInit {

  nuevaCategoriaModel: NuevaCategoriaModel;

  id: number;

  constructor(private route: Router, private router: ActivatedRoute, private blogService: BlogService, private toastr: ToastrService) {
    this.id = +this.router.snapshot.paramMap.get("id");
    this.nuevaCategoriaModel = new NuevaCategoriaModel();
  }

  ngOnInit(): void {
    this.getInfoCategoria();
  }

  async getInfoCategoria() {
    await this.blogService.getInfoCategoria(this.id)
      .subscribe(categoria => {
        this.setDataCategoria(categoria);
      });
  }

  setDataCategoria(categoria: any) {
    this.nuevaCategoriaModel.titulo = categoria.categoria;
    this.nuevaCategoriaModel.descripcion = categoria.descripcion;
    this.nuevaCategoriaModel.etiquetas = JSON.parse(categoria.etiquetas);
  }

  actualizar = () => {

    if (this.nuevaCategoriaModel.titulo != "" && 
      this.nuevaCategoriaModel.descripcion != "" && 
      this.nuevaCategoriaModel.etiquetas != "") {

      let formData = new FormData();

      formData.append('id', localStorage.getItem("id"));
      formData.append('titulo', this.nuevaCategoriaModel.titulo);
      formData.append('descripcion', this.nuevaCategoriaModel.descripcion);
      formData.append('etiquetas', this.nuevaCategoriaModel.etiquetas);

      if (this.nuevaCategoriaModel.image) {
        formData.append('File', this.nuevaCategoriaModel.image, this.nuevaCategoriaModel.image.name);
      }

      this.blogService.updateCategoria(this.id, formData)
        .subscribe(response => {
          if (response) {
            this.toastr.success("La categoria se ha actualizado exitosamente", "Exito!");
            this.route.navigate(["/admin/categoria/list"]);
          } else {
            this.toastr.error("Hubo un error al tratar de actualizar la categoria, intentalo nuevamente", "Error!");
          }
        });

    } else {
      this.toastr.warning("Es necesario llenar todos los campos", "Campos invalidos");
    }
  }

}
