<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index($name) 
    {
        $categoria = $this->getCategoria($name);

        if (!$categoria) { return redirect('/'); }

        return view('category', [
            'last' => $this->getLastNews($categoria->id),
            'posts' => $this->getPostsCategoria($categoria->id),
            'subcategorias' => $this->getSubcategorias($categoria->id),
            'metas' => [
                'title' => $categoria->categoria.' - Jordy Santamaria',
                'description' => $categoria->descripcion,
                'url' => urlBase().'categoria/'.$name,
                'image' => urlAPI().'images/categorias/'.$categoria->id.'.jpg',
                'keywords' => implode(", ", json_decode($categoria->etiquetas))
            ]
        ]);
    }

    private function getCategoria($name) 
    {
        switch ($name) {
            case 'cursos':
                return Categoria::find(2);
                break;
            case 'gameplay':
                return Categoria::find(3);
                break;
            case 'vlogs':
                return Categoria::find(1);
                break;
            default:
                return Categoria::find(0);
                break;
        }
    }

    private function getLastNews($categoria)
    {
        $posts = DB::table('post')
                    ->leftJoin('subcategoria', 'subcategoria.id', '=', 'post.id_subcategoria')
                    ->leftJoin('categoria', 'categoria.id', '=', 'subcategoria.id_categoria')
                    ->select('post.*', 'categoria.categoria', 'subcategoria.subcategoria')
                    ->where('categoria.id', '=', $categoria)
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
                    ->where('categoria.id', '=', $categoria)
                    ->orderByDesc('post.id')
                    ->limit(9)
                    ->get();

        return $posts;
    }

    private function getSubcategorias($categoria)
    {
        $subcategorias = DB::table('subcategoria')
                            ->leftJoin('categoria', 'categoria.id', '=', 'subcategoria.id_categoria')
                            ->select('subcategoria.subcategoria AS name', 'subcategoria.id AS id')
                            ->where('categoria.id', '=', $categoria)
                            ->orderByDesc('subcategoria.id')
                            ->limit(5)
                            ->get();

        return $subcategorias;
    }
}
