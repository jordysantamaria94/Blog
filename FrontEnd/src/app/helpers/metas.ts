import { Injectable } from '@angular/core';
import { Meta } from '@angular/platform-browser';

@Injectable({
    providedIn: 'root'
})
export class Metas {

    constructor(private meta: Meta) {
    }

    public addMetaTags(metas: any) {
        this.meta.addTag({ name: 'title', content: metas.title });
        this.meta.addTag({ name: 'description', content: metas.description });
        this.meta.addTag({ name: 'content-language', content: 'es_MX' });
        this.meta.addTag({ name: 'robots', content: metas.robots });
        this.meta.addTag({ name: 'url', content: metas.url });
        this.meta.addTag({ name: 'author', content: 'Jordy Santamaria' });
        this.meta.addTag({ name: 'image', content: metas.image });
        this.meta.addTag({ name: 'keywords', content: metas.keywords });
        this.meta.addTag({ name: 'fb:app_id', content: '817542738420507' });
        this.meta.addTag({ name: 'og:type', content: metas.type });
        this.meta.addTag({ name: 'og:title', content: metas.title });
        this.meta.addTag({ name: 'og:url', content: metas.url });
        this.meta.addTag({ name: 'og:image', content: metas.image });
        this.meta.addTag({ name: 'og:description', content: metas.description });
        this.meta.addTag({ name: 'og:updated_time', content: metas.date });
        this.meta.addTag({ name: 'twitter:site', content: '@jordysantm' });
        this.meta.addTag({ name: 'twitter:card', content: 'summary_large_image' });
        this.meta.addTag({ name: 'twitter:url', content: metas.url });
        this.meta.addTag({ name: 'twitter:title', content: metas.title });
        this.meta.addTag({ name: 'twitter:description', content: metas.description });
        this.meta.addTag({ name: 'twitter:image', content: metas.image });
    }

    public updateMetaTags(metas: any) {
        this.meta.updateTag({ name: 'title', content: metas.title });
        this.meta.updateTag({ name: 'description', content: metas.description });
        this.meta.updateTag({ name: 'content-language', content: 'es_MX' });
        this.meta.updateTag({ name: 'robots', content: metas.robots });
        this.meta.updateTag({ name: 'url', content: metas.url });
        this.meta.updateTag({ name: 'author', content: 'Jordy Santamaria' });
        this.meta.updateTag({ name: 'image', content: metas.image });
        this.meta.updateTag({ name: 'keywords', content: metas.keywords });
        this.meta.updateTag({ name: 'fb:app_id', content: '817542738420507' });
        this.meta.updateTag({ name: 'og:type', content: metas.type });
        this.meta.updateTag({ name: 'og:title', content: metas.title });
        this.meta.updateTag({ name: 'og:url', content: metas.url });
        this.meta.updateTag({ name: 'og:image', content: metas.image });
        this.meta.updateTag({ name: 'og:description', content: metas.description });
        this.meta.updateTag({ name: 'og:updated_time', content: metas.date });
        this.meta.updateTag({ name: 'twitter:site', content: '@jordysantm' });
        this.meta.updateTag({ name: 'twitter:card', content: 'summary_large_image' });
        this.meta.updateTag({ name: 'twitter:url', content: metas.url });
        this.meta.updateTag({ name: 'twitter:title', content: metas.title });
        this.meta.updateTag({ name: 'twitter:description', content: metas.description });
        this.meta.updateTag({ name: 'twitter:image', content: metas.image });
    }


}