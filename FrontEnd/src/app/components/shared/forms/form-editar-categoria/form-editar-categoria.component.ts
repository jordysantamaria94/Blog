import { Component, Input, OnInit } from '@angular/core';
import { ToastrService } from 'ngx-toastr';
import { NuevaCategoriaModel } from 'src/app/models/admin/categorias/nueva-categoria.model';

@Component({
  selector: 'app-form-editar-categoria',
  templateUrl: './form-editar-categoria.component.html',
  styleUrls: ['./form-editar-categoria.component.css']
})
export class FormEditarCategoriaComponent implements OnInit {

  @Input() categoriaForm: NuevaCategoriaModel;
  @Input() image: any;
  @Input() submit: any;

  imageUrl: any;

  constructor(private toastr: ToastrService) { }

  ngOnInit(): void {
  }

  showPreview(event) {
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
