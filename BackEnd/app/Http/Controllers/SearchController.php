<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request) {
        $search = $request->search;

        return view('search', [
            'search'  => $search,
            'results' => $this->searchPosts($search),
            'metas' => [
                'title' => $search.' - Jordy Santamaria',
                'description' => 'Resultados de: '.$search,
                'url' => 'https://www.jordysantamaria.com/busqueda?search='.$search,
                'image' => 'https://www.jordysantamaria.com/images/logo/wallpaper.jpg',
                'keywords' => 'blog, gameplay, vlog, cursos, tutoriales, courses, videojuegos'
            ]
        ]);
    }

    public function searchPosts($search) {
        return DB::table('post')
            ->leftJoin('subcategoria', 'subcategoria.id', '=', 'post.id_subcategoria')
            ->leftJoin('categoria', 'categoria.id', '=', 'subcategoria.id_categoria')
            ->select('post.*', 'categoria.categoria', 'subcategoria.subcategoria')
            ->whereRaw("post.titulo LIKE '%".$search."%' OR post.etiquetas LIKE '%".$search."%'")
            ->limit(10)
            ->get();
    }
}
