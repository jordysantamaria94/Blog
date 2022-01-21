export class NuevaSerieModel {
    
    categoria: number;
    titulo: string;
    image: any;
    descripcion: string;
    etiquetas: string;

    constructor(categoria: number, titulo: string, image: any, descripcion: string, etiquetas: string) {
        this.categoria = categoria;
        this.titulo = titulo;
        this.image = image;
        this.descripcion = descripcion;
        this.etiquetas = etiquetas;
    }
}