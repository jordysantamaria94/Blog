<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Subcategoria;

class SerieController extends Controller
{
    public function index(Request $request) 
    {
        $id = $request->id;
        $name = $request->name;

        $subcategoria = $this->getSubcategoria($id);

        return view('serie', [
            'last' => $this->getLastNews($id),
            'posts' => $this->getPostsCategoria($id),
            'metas' => [
                'title' => $subcategoria->subcategoria.' - Jordy Santamaria',
                'description' => $subcategoria->descripcion,
                'url' => 'https://www.jordysantamaria.com/serie/'.$subcategoria->subcategoria.'/'.$subcategoria->id,
                'image' => 'https://www.jordysantamaria.com/images/subcategorias/'.$subcategoria->id.'.jpg',
                'keywords' => implode(", ", json_decode($subcategoria->etiquetas))
            ]
        ]);
    }

    private function getSubcategoria($id) {
        return Subcategoria::find($id);
    }

    private function getLastNews($id)
    {
        $posts = DB::table('post')
                    ->leftJoin('subcategoria', 'subcategoria.id', '=', 'post.id_subcategoria')
                    ->leftJoin('categoria', 'categoria.id', '=', 'subcategoria.id_categoria')
                    ->select('post.*', 'categoria.categoria', 'subcategoria.subcategoria')
                    ->where('subcategoria.id', '=', $id)
                    ->orderByDesc('post.id')
                    ->first();

        return $posts;
    }

    private function getPostsCategoria($id)
    {
        $posts = DB::table('post')
                    ->leftJoin('subcategoria', 'subcategoria.id', '=', 'post.id_subcategoria')
                    ->leftJoin('categoria', 'categoria.id', '=', 'subcategoria.id_categoria')
                    ->select('post.id', 'post.titulo', 'post.url', 'post.breve_descripcion', 'categoria.categoria', 'subcategoria.subcategoria', 'post.created_at')
                    ->where('subcategoria.id', '=', $id)
                    ->orderByDesc('post.id')
                    ->limit(9)
                    ->get();

        return $posts;
    }
}
