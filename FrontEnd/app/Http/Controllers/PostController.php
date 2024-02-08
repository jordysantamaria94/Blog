<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    public function index($id , $url)
    {
        $detail = $this->getPostDetail($id);

        return view('post', [
            'detail' => $detail,
            'recommendationsCategory' => $this->getRecomendaciones($id, $detail->id_subcategoria, 2),
            'metas' => [
                'title' => $detail->titulo.' - Jordy Santamaria',
                'description' => $detail->breve_descripcion,
                'url' => urlBase().'post/'.$detail->id.'/'.$detail->url,
                'image' => urlAPI().'images/posts/'.$detail->id.'.jpg',
                'keywords' => implode(", ", json_decode($detail->etiquetas))
            ]
        ]);
    }

    private function getPostDetail($id)
    {
        return DB::table('post')
            ->leftJoin('subcategoria', 'subcategoria.id', '=', 'post.id_subcategoria')
            ->leftJoin('categoria', 'categoria.id', '=', 'subcategoria.id_categoria')
            ->select('post.*', 'categoria.categoria', 'subcategoria.subcategoria')
            ->where('post.id', '=', $id)
            ->first();
    }

    private function getRecomendaciones($id, $id_subcategoria, $limit)
    {
        return DB::table('post')
            ->leftJoin('subcategoria', 'subcategoria.id', '=', 'post.id_subcategoria')
            ->leftJoin('categoria', 'categoria.id', '=', 'subcategoria.id_categoria')
            ->select('post.*', 'categoria.categoria', 'subcategoria.subcategoria')
            ->where('post.id', '<>', $id)
            ->where('subcategoria.id', '<>', $id_subcategoria)
            ->limit($limit)
            ->get();
    }

    private function getRecomendacionesCategoria($id, $id_subcategoria, $limit)
    {
        return DB::table('post')
            ->leftJoin('subcategoria', 'subcategoria.id', '=', 'post.id_subcategoria')
            ->leftJoin('categoria', 'categoria.id', '=', 'subcategoria.id_categoria')
            ->select('post.*', 'categoria.categoria', 'subcategoria.subcategoria')
            ->where('post.id', '<>', $id)
            ->where('subcategoria.id', '=', $id_subcategoria)
            ->limit($limit)
            ->get();
    }
}
