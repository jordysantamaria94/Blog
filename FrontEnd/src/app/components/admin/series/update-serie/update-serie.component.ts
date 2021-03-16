import { Component, OnInit } from '@angular/core';
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

  nuevaSerieModel: NuevaSerieModel;

  id: number;

  constructor(private blogService: BlogService, private toastr: ToastrService, private route: Router, private router: ActivatedRoute) { 
    this.id = +this.router.snapshot.paramMap.get("id");
    this.nuevaSerieModel = new NuevaSerieModel();
  }

  ngOnInit(): void {
    this.getInfoSerie();
  }

  async getInfoSerie() {
    await this.blogService.getInfoSerie(this.id)
      .subscribe(serie => {
        this.setDataSerie(serie);
      });
  }

  setDataSerie(serie: any) {
    this.nuevaSerieModel.categoria = serie.id_categoria;
    this.nuevaSerieModel.titulo = serie.subcategoria;
    this.nuevaSerieModel.descripcion = serie.descripcion;
    this.nuevaSerieModel.etiquetas = JSON.parse(serie.etiquetas);
  }

  actualizar = () => {
    if (this.nuevaSerieModel.categoria != 0 &&
      this.nuevaSerieModel.titulo != "" && 
      this.nuevaSerieModel.descripcion != "" && 
      this.nuevaSerieModel.etiquetas != "") {

      let formData = new FormData();
      
      formData.append('id', localStorage.getItem("id"));
      formData.append('categoria', this.nuevaSerieModel.categoria.toString());
      formData.append('titulo', this.nuevaSerieModel.titulo);
      formData.append('descripcion', this.nuevaSerieModel.descripcion);
      formData.append('etiquetas', this.nuevaSerieModel.etiquetas);

      if (this.nuevaSerieModel.image) {
        formData.append('File', this.nuevaSerieModel.image, this.nuevaSerieModel.image.name);
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
