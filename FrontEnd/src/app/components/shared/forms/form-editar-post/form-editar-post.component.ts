import { Component, Input, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';
import { CategoriaDropdown } from 'src/app/models/admin/dropdowns/categoria-dropdown';
import { SerieDropdown } from 'src/app/models/admin/dropdowns/serie.dropdown';
import { NuevoPostModel } from 'src/app/models/admin/posts/nuevo-post.model';
import { BlogService } from 'src/app/services/blog.service';

@Component({
  selector: 'app-form-editar-post',
  templateUrl: './form-editar-post.component.html',
  styleUrls: ['./form-editar-post.component.css']
})
export class FormEditarPostComponent implements OnInit {

  @Input() postForm: NuevoPostModel;
  @Input() image: any;
  @Input() submit: any;

  categorias: CategoriaDropdown[] = [];
  series: SerieDropdown[] = [];
  imageUrl: any;

  constructor(private blogService: BlogService, private toastr: ToastrService, private route: Router) { }

  ngOnInit(): void {
    this.prepareForm();
  }

  prepareForm(): void {

    try {

      this.blogService.getPrepareNewPost()
        .subscribe(response => {
          this.categorias = response['categorias'];
          this.series = response['subcategorias'];
        }, error => {
          console.log(error);
          localStorage.clear();
          this.route.navigate(['/']);
        });
      
    } catch (error) {
      console.log(error);
      localStorage.clear();
      this.route.navigate(['/']);
    }
  }

  showPreview(event): void {
    if (event.target.files[0].type.match(/image\/*/) == null) {
      this.toastr.warning("El formato es invalido, intenta con uno diferente", "Formato invalido")
    } else {
      var reader = new FileReader();
      reader.readAsDataURL(event.target.files[0]);
      this.image(event.target.files[0]);
      
      reader.onload = (_event) => {
        this.imageUrl = reader.result; 
      }
    }
  }

}
