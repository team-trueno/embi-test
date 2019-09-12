<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Respuesta;
use App\Jugador;

class JuegoController extends Controller
{
    public function test(Request $request)
    {


        //return 'A';
        $respuesta = Respuesta::find($request['respuesta']);

        //$pregunta = $respuesta->pregunta;

        $respuestas = $respuesta->pregunta->respuestas;
        //


        $jugador = Jugador::find($request['jugador']);
        // dd($respuesta->id);
        //return ['detalle' => $respuesta->detalle, 'correcta' => $respuesta->correcta, 'msg' => 'HOLA'];
        return compact('respuestas', 'respuesta', 'jugador');
    }
}
