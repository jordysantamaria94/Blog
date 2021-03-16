import { Component, Input, OnInit } from '@angular/core';
import { ToastrService } from 'ngx-toastr';

@Component({
  selector: 'app-form-nueva-categoria',
  templateUrl: './form-nueva-categoria.component.html',
  styleUrls: ['./form-nueva-categoria.component.css']
})
export class FormNuevaCategoriaComponent implements OnInit {

  @Input() nuevaCategoriaModel: any;
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
      this.nuevaCategoriaModel.image = event.target.files[0];
      
      reader.onload = (_event) => {
        this.imageUrl = reader.result; 
      }
    }
  }

}
