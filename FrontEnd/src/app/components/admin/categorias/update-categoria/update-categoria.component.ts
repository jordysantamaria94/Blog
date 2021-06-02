import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
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

  id: number;
  image: string;
  formUpdateCategoria: NuevaCategoriaModel;

  constructor(private route: Router, private router: ActivatedRoute, private blogService: BlogService, private toastr: ToastrService) {
    this.id = +this.router.snapshot.paramMap.get("id");
  }

  ngOnInit(): void {
    this.getInfoCategoria();
  }

  updateImage = (image: string): void => {
    this.image = image;
  }

  async getInfoCategoria() {
    await this.blogService.getInfoCategoria(this.id)
      .subscribe(categoria => {
        this.formUpdateCategoria = new NuevaCategoriaModel(categoria.categoria, this.image, categoria.descripcion, JSON.parse(categoria.etiquetas));
      }, error => {
        console.log(error);
        localStorage.clear();
        this.route.navigate(["/"]);
      });
  }

  actualizar = (sendForm: NgForm): void => {

    const formCategoria = new NuevaCategoriaModel(sendForm.value.titulo, this.image, sendForm.value.descripcion, sendForm.value.etiquetas);

    if (formCategoria.titulo != "" && 
      formCategoria.descripcion != "" && 
      formCategoria.etiquetas != "") {

      let formData = new FormData();

      formData.append('id', localStorage.getItem("id"));
      formData.append('titulo', formCategoria.titulo);
      formData.append('descripcion', formCategoria.descripcion);
      formData.append('etiquetas', formCategoria.etiquetas);

      if (formCategoria.image) {
        formData.append('File', formCategoria.image, formCategoria.image.name);
      }

      this.blogService.updateCategoria(this.id, formData)
        .subscribe(response => {
          if (response) {
            this.toastr.success("La categoria se ha actualizado exitosamente", "Exito!");
            this.route.navigate(["/admin/categoria/list"]);
          } else {
            this.toastr.error("Hubo un error al tratar de actualizar la categoria, intentalo nuevamente", "Error!");
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
