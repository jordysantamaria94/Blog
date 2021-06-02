<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Post;

class MainController extends Controller
{
    public function lastNews() 
    {
        return response()->json([
            'posts' => $this->getLastNews(),
            'cursos' => $this->getPostsCategoria('Cursos'),
            'gameplays' => $this->getPostsCategoria('Gameplays'),
            'vlogs' => $this->getPostsCategoria('Blog'),
            'subcategorias' => $this->getSubcategorias(),
            'metas' => [
                'title' => '',
                'description' => '',
                'url' => '',
                'image' => '',
                'keywords' => ''
            ]
        ], 201);
    }

    private function getLastNews() 
    {
        $posts = DB::table('post')
                    ->leftJoin('subcategoria', 'subcategoria.id', '=', 'post.id_subcategoria')
                    ->leftJoin('categoria', 'categoria.id', '=', 'subcategoria.id_categoria')
                    ->select('post.id', 'post.titulo', 'post.url', 'post.breve_descripcion', 'categoria.categoria', 'subcategoria.subcategoria', 'post.created_at')
                    ->orderByDesc('post.id')
                    ->limit(3)
                    ->get();

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
