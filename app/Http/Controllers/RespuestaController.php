<?php

namespace App\Http\Controllers;

use App\Respuesta;
use Illuminate\Http\Request;

class RespuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuestas = Respuesta::orderBy('id','DESC')->paginate(5);
        return view('respuestas.index', compact('respuestas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('respuestas.create');
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
            'detalle'=>'string|min:2|max:100',
            'correcta'=>'required|boolean',
            'pregunta_id'=>'required|string|min:1|max:100',
        ];

        $mensajes = [
            'string'=>'El campo debe ser un texto',
            'min'=>'El campo debe tener un minimo de :min caracteres',
            'max'=>'El campo debe tener un máximo de :max caracteres',
            'boolean'=>'El campo debe ser un booleano',
        ];

        $this->validate($request, $reglas, $mensajes);
        Respuesta::create($request->all());
        return redirect()->route('respuestas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function show(Respuesta $respuesta)
    {
        return view('respuestas.show',compact('respuesta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(Respuesta $respuesta)
    {
        return view('respuestas.edit', compact('respuesta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Respuesta $respuesta)
    {
        $reglas = [
            'detalle'=>'required|string|min:2|max:100',
            'correcta'=>'required|boolean',
            'pregunta_id'=>'required|string|min:1|max:100',
        ];

        $mensajes = [
            'string'=>'El campo debe ser un texto',
            'min'=>'El campo debe tener un minimo de :min caracteres',
            'max'=>'El campo debe tener un máximo de :max caracteres',
            'boolean'=>'El campo debe ser un booleano',
        ];

        $this->validate($request, $reglas, $mensajes);

        $respuesta->update($request->all());

        return redirect()->route('respuestas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Respuesta $respuesta)
    {
        $respuesta->delete();
        return redirect()->route('respuestas.index');
    }
}
