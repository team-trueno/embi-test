<?php

namespace App\Http\Controllers;

use App\Pregunta;
use App\Respuesta;

use Illuminate\Http\Request;


class PreguntaRespuestasController extends Controller
{
    public function store(Request $request, Pregunta $pregunta)
    {
        //$input = $request->input();

        $validatedData = $request->validate([
            'detalle.*' => 'required',
        ]);



        //$detalles = $request->input('detalle.*');
        //return dd($name);
        foreach ($validatedData['detalle'] as $detalle) {
            //dd($respuesta);
            $pregunta->addRespuesta($detalle);
        }

        $pregunta->completado();
        $pregunta->activado();

        return back();
    }

    public function update(Request $request, Pregunta $pregunta)
    {
        //dd($request);

        $validatedData = $request->validate([
            'respuestas.*.id' => 'required',
            'respuestas.*.detalle' => 'required',
        ]);

        //dd($validatedData);

        foreach ($validatedData['respuestas'] as $respuesta) {
            $resp = Respuesta::find($respuesta['id']);
            $resp->update([
                'detalle' => $respuesta['detalle'],
            ]);
        }
        return redirect()->route('preguntas.show', compact('pregunta'));
    }

    public function edit(Pregunta $pregunta)
    {
        $respuestas = $pregunta->respuestas;
        return view('pregunta_respuesta', compact('pregunta', 'respuestas'));
    }

}
