import { Component, Input, OnInit } from '@angular/core';
import { ToastrService } from 'ngx-toastr';
import { BlogService } from 'src/app/services/blog.service';

@Component({
  selector: 'app-form-nuevo-post',
  templateUrl: './form-nuevo-post.component.html',
  styleUrls: ['./form-nuevo-post.component.css']
})
export class FormNuevoPostComponent implements OnInit {

  @Input() nuevoPostModel: any;
  @Input() submit: any;

  categorias: any = [];
  series: any = [];
  imageUrl: any;

  constructor(private blogService: BlogService, private toastr: ToastrService) { }

  ngOnInit(): void {

    this.prepareForm();
  }

  prepareForm() {
    this.blogService.getPrepareNewPost()
      .subscribe(response => {
        this.categorias = response['categorias'];
        this.series = response['subcategorias'];
      });
  }

  showPreview(event) {
    if (event.target.files[0].type.match(/image\/*/) == null) {
      this.toastr.warning("El formato es invalido, intenta con uno diferente", "Formato invalido")
    } else {
      var reader = new FileReader();
      reader.readAsDataURL(event.target.files[0]);
      this.nuevoPostModel.image = event.target.files[0];
      
      reader.onload = (_event) => {
        this.imageUrl = reader.result; 
      }
    }
  }

}
