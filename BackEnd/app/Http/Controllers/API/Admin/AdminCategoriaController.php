<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Categoria;

class AdminCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::orderByDesc('id')
                        ->paginate(10);

        return response()->json([
            'categorias' => $categorias,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria;

        $categoria->categoria   = $request->titulo;
        $categoria->descripcion = $request->descripcion;
        $categoria->etiquetas   = json_encode(explode(", ",$request->etiquetas));

        if ($categoria->save()) {
            $photo = $request->file('File');
            $photo->move('images/categorias/', $categoria->id.".jpg");
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
        $categoria = Categoria::where('id', $id)->first();

        return response()->json([
            'categoria' => $categoria
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
        $categoria = Categoria::where('id', $id)->first();

        $categoria->categoria   = $request->titulo;
        $categoria->descripcion = $request->descripcion;
        $categoria->etiquetas   = json_encode(explode(", ",$request->etiquetas));

        if ($categoria->save() && $request->file('File')) {
            $photo = $request->file('File');
            $photo->move('images/categorias/', $id.".jpg");
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
        //
    }
}
