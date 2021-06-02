export class NuevoPostModel {
    categoria: number;
    serie: number;
    titulo: string;
    url: string;
    image: any;
    descripcionPortada: string;
    descripcionCorta: string;
    content: string;
    etiquetas: string;

    constructor(categoria: number, serie: number, titulo: string, url: string, image: any, descripcionPortada: string, descripcionCorta: string, content: string, etiquetas: string) {
        this.categoria = categoria;
        this.serie = serie;
        this.titulo = titulo;
        this.url = url;
        this.image = image;
        this.descripcionPortada = descripcionPortada;
        this.descripcionCorta = descripcionCorta;
        this.content = content;
        this.etiquetas = etiquetas;
    }
}