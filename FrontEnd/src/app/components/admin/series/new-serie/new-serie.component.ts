import { Component, OnInit } from '@angular/core';
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

  nuevaSerieModel: NuevaSerieModel;

  constructor(private blogService: BlogService, private toastr: ToastrService, private route: Router) { 
    this.nuevaSerieModel = new NuevaSerieModel();
  }

  ngOnInit(): void {
  }

  registrar = () => {
    if (this.nuevaSerieModel.categoria != 0 &&
      this.nuevaSerieModel.titulo != "" && 
      this.nuevaSerieModel.image && 
      this.nuevaSerieModel.descripcion != "" && 
      this.nuevaSerieModel.etiquetas != "") {

      let formData = new FormData();
      
      formData.append('id', localStorage.getItem("id"));
      formData.append('categoria', this.nuevaSerieModel.categoria.toString());
      formData.append('titulo', this.nuevaSerieModel.titulo);
      formData.append('File', this.nuevaSerieModel.image, this.nuevaSerieModel.image.name);
      formData.append('descripcion', this.nuevaSerieModel.descripcion);
      formData.append('etiquetas', this.nuevaSerieModel.etiquetas);

      console.log(this.nuevaSerieModel);

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
