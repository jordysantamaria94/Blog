import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
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

  id: number;
  postForm: NuevoPostModel;
  image: string;

  constructor(private route: Router, private router: ActivatedRoute, private blogService: BlogService, private toastr: ToastrService) {
    this.id = +this.router.snapshot.paramMap.get("id");
  }

  ngOnInit(): void {
    this.getInfoPost();
  }

  async getInfoPost() {
    
    try {

      await this.blogService.getInfoPost(this.id)
        .subscribe(post => {
          this.setDataPost(post);    
        }, error => {
          localStorage.clear();
          this.route.navigate(['/']);
        });
      
    } catch (error) {
      console.log(error);
      localStorage.clear();
      this.route.navigate(['/']);
    }

  }

  setDataPost(post: any): void {
    this.postForm = new NuevoPostModel(post.id_categoria, post.id_subcategoria, post.titulo, post.url, "", post.descripcion_foto, post.breve_descripcion, post.descripcion, JSON.parse(post.etiquetas));
  }

  updateImage = (image: string): void => {
    this.image = image;
  }

  actualizar = (sendForm: NgForm): void => {

    const postFormUpdate = new NuevoPostModel(sendForm.value.categoria, sendForm.value.serie, sendForm.value.titulo, sendForm.value.url, this.image, sendForm.value.descripcionPortada, sendForm.value.descripcionCorta, sendForm.value.content, sendForm.value.etiquetas);

    try {

      if (postFormUpdate.categoria != 0 && 
          postFormUpdate.serie != 0 && 
          postFormUpdate.titulo != "" && 
          postFormUpdate.url != "" && 
          postFormUpdate.descripcionPortada != "" && 
          postFormUpdate.descripcionCorta != "" && 
          postFormUpdate.content != "" && 
          postFormUpdate.etiquetas != "") {
    
          let formData = new FormData();
    
          formData.append('id', localStorage.getItem("id"));
          formData.append('serie', postFormUpdate.serie.toString());
          formData.append('titulo', postFormUpdate.titulo);
          formData.append('url', postFormUpdate.url);
          formData.append('descripcionPortada', postFormUpdate.descripcionPortada);
          formData.append('descripcionCorta', postFormUpdate.descripcionCorta);
          formData.append('content', postFormUpdate.content);
          formData.append('etiquetas', postFormUpdate.etiquetas);
    
          if (postFormUpdate.image) {
            formData.append('File', postFormUpdate.image, postFormUpdate.image.name);
          }
    
          this.blogService.updatePost(this.id, formData)
            .subscribe(response => {
              if (response) {
                this.toastr.success("El post se ha actualizado exitosamente", "Exito!");
                this.route.navigate(["/admin/posts/list"]);
              } else {
                this.toastr.error("Hubo un error al tratar de actualizar el post, intentalo nuevamente", "Error!");
              }
            }, error => {
              console.log(error);
              localStorage.clear();
              this.route.navigate(["/"]);
            });
    
        } else {
          this.toastr.warning("Es necesario llenar todos los campos", "Campos invalidos");
        }
      
    } catch (error) {
      console.log(error);
    }
  }

}
