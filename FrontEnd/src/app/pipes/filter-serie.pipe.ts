import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filterSerie'
})
export class FilterSeriePipe implements PipeTransform {

  transform(data: any, id_categoria: string): unknown {
    if (id_categoria != "0") {
      data = data.filter(marker => (marker.id_categoria == id_categoria));
      return data;
    } else {
      return;
    }
  }

}
