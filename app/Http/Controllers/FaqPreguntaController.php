<?php

namespace App\Http\Controllers;

use App\FaqPregunta;
use App\FaqTopico;
use Illuminate\Http\Request;

class FaqPreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topicos = FaqTopico::all();
        $preguntas = FaqPregunta::orderBy('id','DESC')->paginate(5);
        return view('faq.preguntas.index', compact('preguntas', 'topicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topicos = FaqTopico::all();
        return view('faq.preguntas.create', compact('topicos'));
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
            'detalle'=>'required|string|min:1|max:100|unique:faq_preguntas,detalle',
            'respuesta'=>'required|string|min:1|max:100',
            'faq_topico_id'=>'required|string'
        ];

        $mensajes = [
            'string'=>'El campo :attribute debe ser un texto', 
            'min'=>'El campo :attribute debe tener un minimo de :min caracteres', 
            'max'=>'El campo :attribute debe tener un máximo de :max caracteres',
            'unique'=>'Esta pregunta ya está registrada en la Base de Datos'
        ];

        $this->validate($request, $reglas, $mensajes);
        FaqPregunta::create($request->all());
        return redirect()->route('faq.preguntas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FaqPregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(FaqPregunta $pregunta)
    {
        return view('faq.preguntas.show', compact('pregunta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FaqPregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(FaqPregunta $pregunta)
    {
        $topicos = FaqTopico::all();
        return view('faq.preguntas.edit', compact('pregunta', 'topicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FaqPregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FaqPregunta $pregunta)
    {
        $reglas = [
            'detalle'=>'string|min:1|max:100',
            'respuesta'=>'string|min:1|max:100',
            'faq_topico_id'=>'string'
        ];

        $mensajes = [
            'string'=>'El campo :attribute debe ser un texto', 
            'min'=>'El campo :attribute debe tener un minimo de :min caracteres', 
            'max'=>'El campo :attribute debe tener un máximo de :max caracteres'
        ];

        $this->validate($request, $reglas, $mensajes);
 
        $pregunta->update([
            'detalle' => $request['detalle'],
            'respuesta' => $request['respuesta'],
            'faq_topico_id' => $request['faq_topico_id']
        ]);
        
        return redirect()->route('faq.preguntas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FaqPregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(FaqPregunta $pregunta)
    {
        $faqPregunta->delete();
        return redirect()->route('faq.preguntas.index');
    }
}
