<?php

namespace App\Http\Controllers;

use App\CategoriaPregunta;
use Illuminate\Http\Request;

class CategoriaPreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriasPreguntas = CategoriaPregunta::orderBy('id','DESC')->paginate(5);
        return view('categorias-preguntas.index',compact('categoriasPreguntas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias-preguntas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            'detalle'=>'string|min:1|max:100|unique:categoria_preguntas,detalle'
        ];

        $mensajes = [
            'string'=>'El campo :attribute debe ser un texto', 
            'min'=>'El campo :attribute debe tener un minimo de :min caracteres', 
            'max'=>'El campo :attribute debe tener un máximo de :max caracteres',
            'unique'=>'Esta categoría ya está registrada en la Base de Datos'
        ];
        
        $this->validate($request, $reglas, $mensajes);
        CategoriaPregunta::create($request->all());
        return redirect()->route('categorias-preguntas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoriaPregunta  $categoriaPregunta
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriaPregunta $categoriasPregunta)
    {
        return  view('categorias-preguntas.show',compact('categoriasPregunta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoriaPregunta  $categoriaPregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriaPregunta $categoriasPregunta)
    {
        return view('categorias-preguntas.edit',compact('categoriasPregunta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoriaPregunta  $categoriaPregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriaPregunta $categoriasPregunta)
    {
        $reglas = [
            'detalle'=>'required|string|min:1|max:100|unique:categoria_preguntas,detalle'
        ];

        $mensajes = [
            'string'=>'El campo :attribute debe ser un texto', 
            'min'=>'El campo :attribute debe tener un minimo de :min caracteres', 
            'max'=>'El campo :attribute debe tener un máximo de :max caracteres',
            'unique'=>'Esta categoría ya está registrada en la Base de Datos'
        ];

        $this->validate($request, $reglas, $mensajes);
 
        $categoriasPregunta->update($request->all());

        return redirect()->route('categorias-preguntas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoriaPregunta  $categoriaPregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriaPregunta $categoriasPregunta)
    {
        $categoriasPregunta->delete();
        return redirect()->route('categorias-preguntas.index');
    }
}
