<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Post;

class CategoriaController extends Controller
{
    public function lastNews(Request $request) 
    {
        return response()->json([
            'posts' => $this->getLastNews($request->id),
            'subcategorias' => $this->getSubcategorias($request->id),
            'metas' => [
                'title' => '',
                'description' => '',
                'url' => '',
                'image' => '',
                'keywords' => ''
            ]
        ], 201);
    }

    private function getLastNews($id) 
    {
        $posts = DB::table('post')
                    ->leftJoin('subcategoria', 'subcategoria.id', '=', 'post.id_subcategoria')
                    ->leftJoin('categoria', 'categoria.id', '=', 'subcategoria.id_categoria')
                    ->select('post.id', 'post.titulo', 'post.url', 'post.breve_descripcion', 'categoria.categoria', 'subcategoria.subcategoria', 'post.created_at')
                    ->where('categoria.id', '=', $id)
                    ->orderByDesc('post.id')
                    ->limit(12)
                    ->get();

        return $posts;
    }

    private function getSubcategorias($id) 
    {
        $subcategorias = DB::table('subcategoria')
                            ->select('subcategoria.subcategoria AS name', 'subcategoria.id AS id')
                            ->where('subcategoria.id_categoria', '=', $id)
                            ->limit(5)
                            ->get();

        return $subcategorias;
    }
}
