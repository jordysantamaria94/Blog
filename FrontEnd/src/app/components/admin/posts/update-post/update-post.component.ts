import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';
import { NuevoPostModel } from 'src/app/models/admin/posts/nuevo-post.model';
import { BlogService } from 'src/app/services/blog.service';

@Component({
  selector: 'app-update-post',
  templateUrl: './update-post.component.html',
  styleUrls: ['./update-post.component.css']
})
export class UpdatePostComponent implements OnInit {

  nuevoPostModel: NuevoPostModel;

  id: number;

  constructor(private route: Router, private router: ActivatedRoute, private blogService: BlogService, private toastr: ToastrService) {
    this.id = +this.router.snapshot.paramMap.get("id");
    this.nuevoPostModel = new NuevoPostModel();
  }

  ngOnInit(): void {
    this.getInfoPost();
  }

  async getInfoPost() {
    await this.blogService.getInfoPost(this.id)
      .subscribe(post => {
        this.setDataPost(post);    
      });
  }

  setDataPost(post: any) {
    this.nuevoPostModel.categoria = post.id_categoria;
    this.nuevoPostModel.serie = post.id_subcategoria;
    this.nuevoPostModel.titulo = post.titulo;
    this.nuevoPostModel.url = post.url;
    this.nuevoPostModel.descripcionPortada = post.descripcion_foto;
    this.nuevoPostModel.descripcionCorta = post.breve_descripcion;
    this.nuevoPostModel.content = post.descripcion;
    this.nuevoPostModel.etiquetas = JSON.parse(post.etiquetas);
  }

  actualizar = () => {

    if (this.nuevoPostModel.categoria != 0 && 
      this.nuevoPostModel.serie != 0 && 
      this.nuevoPostModel.titulo != "" && 
      this.nuevoPostModel.url != "" && 
      this.nuevoPostModel.descripcionPortada != "" && 
      this.nuevoPostModel.descripcionCorta != "" && 
      this.nuevoPostModel.content != "" && 
      this.nuevoPostModel.etiquetas != "") {

      let formData = new FormData();

      formData.append('id', localStorage.getItem("id"));
      formData.append('serie', this.nuevoPostModel.serie.toString());
      formData.append('titulo', this.nuevoPostModel.titulo);
      formData.append('url', this.nuevoPostModel.url);
      formData.append('descripcionPortada', this.nuevoPostModel.descripcionPortada);
      formData.append('descripcionCorta', this.nuevoPostModel.descripcionCorta);
      formData.append('content', this.nuevoPostModel.content);
      formData.append('etiquetas', this.nuevoPostModel.etiquetas);

      if (this.nuevoPostModel.image) {
        formData.append('File', this.nuevoPostModel.image, this.nuevoPostModel.image.name);
      }

      this.blogService.updatePost(this.id, formData)
        .subscribe(response => {
          if (response) {
            this.toastr.success("El post se ha actualizado exitosamente", "Exito!");
            this.route.navigate(["/admin/posts/list"]);
          } else {
            this.toastr.error("Hubo un error al tratar de actualizar el post, intentalo nuevamente", "Error!");
          }
        });

    } else {
      this.toastr.warning("Es necesario llenar todos los campos", "Campos invalidos");
    }
  }

}
