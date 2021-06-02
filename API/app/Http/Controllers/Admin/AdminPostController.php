<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Post;
use App\Models\Categoria;
use App\Models\Subcategoria;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::leftJoin('subcategoria', 'subcategoria.id', '=', 'post.id_subcategoria')
            ->select('post.id', 'post.titulo', 'post.url', 'post.breve_descripcion', 'subcategoria.subcategoria', 'post.created_at')
            ->orderByDesc('post.id')
            ->paginate(10);

        return response()->json([
            'posts' => $posts,
            'metas' => [
                'title' => '',
                'description' => '',
                'url' => '',
                'image' => '',
                'keywords' => ''
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json([
            'categorias' => Categoria::all(),
            'subcategorias' => Subcategoria::all()
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;

        $post->id_subcategoria    = $request->serie;
        $post->id_usuario         = $request->id;
        $post->titulo             = $request->titulo;
        $post->url                = $request->url;
        $post->descripcion_foto   = $request->descripcionPortada;
        $post->breve_descripcion  = $request->descripcionCorta;
        $post->descripcion        = $request->content;
        $post->etiquetas          = json_encode(explode(", ",$request->etiquetas));

        if ($post->save()) {
            $photo = $request->file('File');
            $photo->move('images/posts/', $post->id.".jpg");
        }

        return response()->json(true, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::leftJoin('subcategoria', 'subcategoria.id', '=', 'post.id_subcategoria')
                    ->leftJoin('categoria', 'categoria.id', '=', 'subcategoria.id_categoria')
                    ->select('post.*', 'categoria.id AS id_categoria')
                    ->where('post.id', $id)
                    ->first();

        return response()->json([
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();

        $post->id_subcategoria    = $request->serie;
        $post->id_usuario         = $request->id;
        $post->titulo             = $request->titulo;
        $post->url                = $request->url;
        $post->descripcion_foto   = $request->descripcionPortada;
        $post->breve_descripcion  = $request->descripcionCorta;
        $post->descripcion        = $request->content;
        $post->etiquetas          = json_encode(explode(", ",$request->etiquetas));

        if ($post->save() && $request->file('File')) {
            $photo = $request->file('File');
            $photo->move('images/posts/', $id.".jpg");
        }

        return response()->json(true, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Post::where('id', $id)->delete();

        return response()->json([
            'status' => $status
        ]);
    }
}
