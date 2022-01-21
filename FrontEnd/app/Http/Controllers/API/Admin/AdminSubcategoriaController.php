<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Categoria;
use App\Models\Subcategoria;

class AdminSubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategorias = Subcategoria::leftJoin('categoria', 'categoria.id', '=', 'subcategoria.id_categoria')
            ->select('subcategoria.*', 'categoria.categoria')
            ->orderByDesc('subcategoria.id')
            ->paginate(10);

        return response()->json([
            'series' => $subcategorias,
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
            'categorias' => Categoria::all()
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
        $subcategoria = new Subcategoria;

        $subcategoria->id_categoria = $request->categoria;
        $subcategoria->subcategoria = $request->titulo;
        $subcategoria->descripcion  = $request->descripcion;
        $subcategoria->etiquetas    = json_encode(explode(", ",$request->etiquetas));

        if ($subcategoria->save()) {
            $photo = $request->file('File');
            $photo->move('images/subcategorias/', $subcategoria->id.".jpg");
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
        $subcategoria = Subcategoria::where('id', $id)->first();

        return response()->json([
            'serie' => $subcategoria
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
        $subcategoria = Subcategoria::where('id', $id)->first();

        $subcategoria->subcategoria = $request->titulo;
        $subcategoria->descripcion  = $request->descripcion;
        $subcategoria->etiquetas    = json_encode(explode(", ",$request->etiquetas));

        if ($subcategoria->save() && $request->file('File')) {
            $photo = $request->file('File');
            $photo->move('images/subcategorias/', $id.".jpg");
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
