<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    public function getPost(Request $request) 
    {
        return response()->json([
            'detail' => $this->getPostDetail($request->id),
            'recommendations' => $this->getRecomendaciones($request->id, 3),
            'metas' => [
                'title' => '',
                'description' => '',
                'url' => '',
                'image' => '',
                'keywords' => ''
            ]
        ]);
    }

    public function getPostDetail($id) 
    {
        return DB::table('post')
            ->leftJoin('subcategoria', 'subcategoria.id', '=', 'post.id_subcategoria')
            ->leftJoin('categoria', 'categoria.id', '=', 'subcategoria.id_categoria')
            ->select('post.*', 'categoria.categoria', 'subcategoria.subcategoria')
            ->where('post.id', '=', $id)
            ->first();
    }

    public function getRecomendaciones($id, $limit) 
    {
        return DB::table('post')
            ->leftJoin('subcategoria', 'subcategoria.id', '=', 'post.id_subcategoria')
            ->leftJoin('categoria', 'categoria.id', '=', 'subcategoria.id_categoria')
            ->select('post.*', 'categoria.categoria', 'subcategoria.subcategoria')
            ->where('post.id', '<>', $id)
            ->limit($limit)
            ->get();
    }
}
