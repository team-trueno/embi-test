<?php

namespace App\Http\Controllers;

use App\Pregunta;
use App\Respuesta;

use Illuminate\Http\Request;


class PreguntaRespuestasController extends Controller
{
    public function store(Request $request, Pregunta $pregunta)
    {
        auth()->user()->authorizeRoles(['admin', 'superadmin']);
        //$input = $request->input();
        //dd($request);
        $validatedData = $request->validate([
            'respuestas.*.detalle' => 'required',
            'gridRadios' => 'required',
        ]);

        foreach ($validatedData['respuestas'] as $key => $respuesta) {
            $pregunta->addRespuesta([
                'detalle' => $respuesta['detalle'],
                'correcta' => ($key == $validatedData['gridRadios']) ? true : false
            ]);
        }

        $pregunta->completado();
        $pregunta->activado();

        return back();
    }

    public function update(Request $request, Pregunta $pregunta)
    {
        auth()->user()->authorizeRoles(['admin', 'superadmin']);
        //dd($request);

        $validatedData = $request->validate([
            'respuestas.*.id' => 'required',
            'respuestas.*.detalle' => 'required',
            'gridRadios' => 'required',
        ]);

        //dd($validatedData);

        foreach ($validatedData['respuestas'] as $key => $respuesta) {
            $resp = Respuesta::find($respuesta['id']);
            $resp->update([
                'detalle' => $respuesta['detalle'],
                'correcta' => ($key == $validatedData['gridRadios']) ? true : false
            ]);
        }
        return redirect()->route('preguntas.show', compact('pregunta'));
    }

    public function edit(Pregunta $pregunta)
    {
        auth()->user()->authorizeRoles(['admin', 'superadmin']);
        $respuestas = $pregunta->respuestas;
        return view('pregunta_respuesta', compact('pregunta', 'respuestas'));
    }

}
