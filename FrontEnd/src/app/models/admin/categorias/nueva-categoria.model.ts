export class NuevaCategoriaModel {
    titulo: string;
    image: any;
    descripcion: string;
    etiquetas: string;

    constructor(titulo: string, image: any, descripcion: string, etiquetas: string) {
        this.titulo = titulo;
        this.image = image;
        this.descripcion = descripcion;
        this.etiquetas = etiquetas;
    }
}