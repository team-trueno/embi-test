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
        $categoriasPreguntas=CategoriaPregunta::orderBy('id','DESC')->paginate(5);
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
            'categoria'=>'required|string|min:1|max:100|unique:categoria_preguntas,categoria'
        ];

        $mensajes = [
            'string'=>'El campo :attribute debe ser un texto', 
            'min'=>'El campo :attribute debe tener un minimo de :min caracteres', 
            'max'=>'El campo :attribute debe tener un máximo de :max caracteres',
            'unique'=>'Esta categoría ya está registrada en la Base de Datos'
        ];
        
        $this->validate($request, $reglas, $mensajes);
        CategoriaPregunta::create($request->all());
        return redirect()->route('categorias-preguntas.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoriaPregunta  $categoriaPregunta
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriaPregunta $categoriaPregunta, $id)
    {
        $categoriasPreguntas=CategoriaPregunta::find($id);
        return  view('categorias-preguntas.show',compact('categoriasPreguntas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoriaPregunta  $categoriaPregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriaPregunta $categoriaPregunta, $id)
    {
        $categoriasPreguntas=CategoriaPregunta::find($id);
        return view('categorias-preguntas.edit',compact('categoriasPreguntas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoriaPregunta  $categoriaPregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriaPregunta $categoriaPregunta, $id)
    {
        $reglas = [
            'categoria'=>'required|string|min:1|max:100|unique:categoria_preguntas,categoria'
        ];

        $mensajes = [
            'string'=>'El campo :attribute debe ser un texto', 
            'min'=>'El campo :attribute debe tener un minimo de :min caracteres', 
            'max'=>'El campo :attribute debe tener un máximo de :max caracteres',
            'unique'=>'Esta categoría ya está registrada en la Base de Datos'
        ];

        $this->validate($request, $reglas, $mensajes);
 
        CategoriaPregunta::find($id)->update($request->all());
        return redirect()->route('categorias-preguntas.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoriaPregunta  $categoriaPregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriaPregunta $categoriaPregunta, $id)
    {
        CategoriaPregunta::find($id)->delete();
        return redirect()->route('categorias-preguntas.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
