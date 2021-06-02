import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';
import { NuevaSerieModel } from 'src/app/models/admin/series/nueva-serie.model';
import { BlogService } from 'src/app/services/blog.service';

@Component({
  selector: 'app-new-serie',
  templateUrl: './new-serie.component.html',
  styleUrls: ['./new-serie.component.css']
})
export class NewSerieComponent implements OnInit {

  image: string;

  constructor(private blogService: BlogService, private toastr: ToastrService, private route: Router) {}

  ngOnInit(): void {
  }

  updateImage = (image: string): void => {
    this.image = image;
  }

  registrar = (sendForm: NgForm): void => {

    const serieForm = new NuevaSerieModel(sendForm.value.categoria, sendForm.value.titulo, this.image, sendForm.value.descripcion, sendForm.value.etiquetas);

    if (serieForm.categoria != 0 &&
      serieForm.titulo != "" && 
      serieForm.image && 
      serieForm.descripcion != "" && 
      serieForm.etiquetas != "") {

      let formData = new FormData();
      
      formData.append('id', localStorage.getItem("id"));
      formData.append('categoria', serieForm.categoria.toString());
      formData.append('titulo', serieForm.titulo);
      formData.append('File', serieForm.image, serieForm.image.name);
      formData.append('descripcion', serieForm.descripcion);
      formData.append('etiquetas', serieForm.etiquetas);

      this.blogService.setNewSerie(formData)
        .subscribe(response => {
          if (response) {
            this.toastr.success("La serie se ha registrado exitosamente", "Exito!");
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
