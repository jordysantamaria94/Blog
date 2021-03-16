import { Component, Input, OnInit } from '@angular/core';
import { ToastrService } from 'ngx-toastr';
import { BlogService } from 'src/app/services/blog.service';

@Component({
  selector: 'app-form-nueva-serie',
  templateUrl: './form-nueva-serie.component.html',
  styleUrls: ['./form-nueva-serie.component.css']
})
export class FormNuevaSerieComponent implements OnInit {

  @Input() nuevaSerieModel: any;
  @Input() submit: any;

  categorias: any = [];
  imageUrl: any;

  constructor(private toastr: ToastrService, private blogService: BlogService) { }

  ngOnInit(): void {

    this.prepareForm();
  }

  prepareForm() {
    this.blogService.getPrepareNewSerie()
      .subscribe(response => {
        this.categorias = response['categorias'];
      });
  }

  showPreview(event) {
    if (event.target.files[0].type.match(/image\/*/) == null) {
      this.toastr.warning("El formato es invalido, intenta con uno diferente", "Formato invalido")
    } else {
      var reader = new FileReader();
      reader.readAsDataURL(event.target.files[0]);
      this.nuevaSerieModel.image = event.target.files[0];
      
      reader.onload = (_event) => {
        this.imageUrl = reader.result; 
      }
    }
  }

}
