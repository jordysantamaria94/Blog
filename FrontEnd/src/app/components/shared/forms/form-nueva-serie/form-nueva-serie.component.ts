import { Component, Input, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';
import { CategoriaDropdown } from 'src/app/models/admin/dropdowns/categoria-dropdown';
import { BlogService } from 'src/app/services/blog.service';

@Component({
  selector: 'app-form-nueva-serie',
  templateUrl: './form-nueva-serie.component.html',
  styleUrls: ['./form-nueva-serie.component.css']
})
export class FormNuevaSerieComponent implements OnInit {

  @Input() image: any;
  @Input() submit: any;

  categorias: CategoriaDropdown[] = [];
  imageUrl: any;

  constructor(private toastr: ToastrService, private blogService: BlogService, private route: Router) { }

  ngOnInit(): void {
    this.prepareForm();
  }

  prepareForm(): void {
    this.blogService.getPrepareNewSerie()
      .subscribe(response => {
        this.categorias = response['categorias'];
      }, error => {
        console.log(error);
        localStorage.clear();
        this.route.navigate(["/"]);
      });
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
