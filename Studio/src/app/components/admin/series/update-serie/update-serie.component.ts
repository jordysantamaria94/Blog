import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';
import { NuevaSerieModel } from 'src/app/models/admin/series/nueva-serie.model';
import { BlogService } from 'src/app/services/blog.service';

@Component({
  selector: 'app-update-serie',
  templateUrl: './update-serie.component.html',
  styleUrls: ['./update-serie.component.css']
})
export class UpdateSerieComponent implements OnInit {

  id: number;
  image: string;
  formUpdateSerie: NuevaSerieModel;

  constructor(private blogService: BlogService, private toastr: ToastrService, private route: Router, private router: ActivatedRoute) { 
    this.id = +this.router.snapshot.paramMap.get("id");
  }

  ngOnInit(): void {
    this.getInfoSerie();
  }

  async getInfoSerie() {
    await this.blogService.getInfoSerie(this.id)
      .subscribe(serie => {
        this.formUpdateSerie = new NuevaSerieModel(serie.id_categoria, serie.subcategoria, this.image, serie.descripcion, JSON.parse(serie.etiquetas));
      }, error => {
        console.log(error);
        localStorage.clear();
        this.route.navigate(["/"]);
      });
  }

  updateImage = (image: string): void => {
    this.image = image;
  }

  actualizar = (sendForm: NgForm): void => {

    const serieForm = new NuevaSerieModel(sendForm.value.categoria, sendForm.value.titulo, this.image, sendForm.value.descripcion, sendForm.value.etiquetas);

    if (serieForm.categoria != 0 &&
      serieForm.titulo != "" && 
      serieForm.descripcion != "" && 
      serieForm.etiquetas != "") {

      let formData = new FormData();
      
      formData.append('id', localStorage.getItem("id"));
      formData.append('categoria', serieForm.categoria.toString());
      formData.append('titulo', serieForm.titulo);
      formData.append('descripcion', serieForm.descripcion);
      formData.append('etiquetas', serieForm.etiquetas);

      if (serieForm.image) {
        formData.append('File', serieForm.image, serieForm.image.name);
      }

      this.blogService.updateSerie(this.id, formData)
        .subscribe(response => {
          if (response) {
            this.toastr.success("La serie se ha actualizado exitosamente", "Exito!");
            this.route.navigate(["/admin/serie/list"]);
          } else {
            this.toastr.error("Hubo un error al tratar de registrar la serie, intentalo nuevamente", "Error!");
          }
        });

    } else {
      this.toastr.warning("Es necesario llenar todos los campos", "Campos invalidos");
    }
  }

}
