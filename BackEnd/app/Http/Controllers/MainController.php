<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Post;

class MainController extends Controller
{

    public function __construct() {}

    public function index()
    {
        return view('welcome', [
            'last' => $this->getLastNews(),
            'cursos' => $this->getPostsCategoria('Cursos'),
            'gameplays' => $this->getPostsCategoria('Gameplays'),
            'vlogs' => $this->getPostsCategoria('Blog'),
            'subcategorias' => $this->getSubcategorias(),
            'metas' => [
                'title' => 'Jordy Santamaria',
                'description' => 'Bienvenido a mi sitio personal, aqui encontraras cursos / tutoriales, gameplays que hago para mis canales de YouTube y pequeños posts acerca de mi vida personal',
                'url' => 'https://www.jordysantamaria.com/',
                'image' => 'https://www.jordysantamaria.com/images/logo/wallpaper.jpg',
                'keywords' => 'blog, gameplay, vlog, cursos, tutoriales, courses, videojuegos'
            ]
        ]);
    }

    private function getLastNews()
    {
        $posts = DB::table('post')
                    ->leftJoin('subcategoria', 'subcategoria.id', '=', 'post.id_subcategoria')
                    ->leftJoin('categoria', 'categoria.id', '=', 'subcategoria.id_categoria')
                    ->select('post.*', 'categoria.categoria', 'subcategoria.subcategoria')
                    ->orderByDesc('post.id')
                    ->first();

        return $posts;
    }

    private function getPostsCategoria($categoria)
    {
        $posts = DB::table('post')
                    ->leftJoin('subcategoria', 'subcategoria.id', '=', 'post.id_subcategoria')
                    ->leftJoin('categoria', 'categoria.id', '=', 'subcategoria.id_categoria')
                    ->select('post.id', 'post.titulo', 'post.url', 'post.breve_descripcion', 'categoria.categoria', 'subcategoria.subcategoria', 'post.created_at')
                    ->where('categoria.categoria', '=', $categoria)
                    ->orderByDesc('post.id')
                    ->limit(4)
                    ->get();

        return $posts;
    }

    private function getSubcategorias()
    {
        $subcategorias = DB::table('subcategoria')
                            ->select('subcategoria.subcategoria AS name', 'subcategoria.id AS id')
                            ->limit(5)
                            ->get();

        return $subcategorias;
    }
}
