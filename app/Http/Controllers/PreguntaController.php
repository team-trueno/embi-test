<?php

namespace App\Http\Controllers;

use App\Pregunta;
use App\CategoriaPregunta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        auth()->user()->authorizeRoles(['admin', 'superadmin']);
        $preguntas = Pregunta::orderBy('id','DESC')->paginate(15);
        return view('preguntas.index', compact('preguntas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        auth()->user()->authorizeRoles(['admin', 'superadmin']);
        $categorias = CategoriaPregunta::orderBy('detalle')->get();
        //dd($categorias);
        return view('preguntas.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        auth()->user()->authorizeRoles(['admin', 'superadmin']);
        $reglas = [
            'detalle'=>'required|string|min:5|max:100|unique:preguntas,detalle',
            'categoria_pregunta_id'=>'required|string|min:1|max:100'
        ];

        $mensajes = [
            'string'=>'El campo debe ser un texto',
            'min'=>'El campo debe tener un minimo de :min caracteres',
            'max'=>'El campo debe tener un máximo de :max caracteres',
            'unique'=>'Esta pregunta ya está registrada en la Base de Datos'
        ];

        $this->validate($request, $reglas, $mensajes);
        $pregunta = Pregunta::create($request->all());

        //return redirect()->route('/preguntas/{pregunta}/respuestas');
        //return view('pregunta_respuesta', compact('pregunta'));
        return redirect()->route('preguntas.show', compact('pregunta'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $pregunta)
    {
        auth()->user()->authorizeRoles(['admin', 'superadmin']);
        //$preguntas = Pregunta::find($id);
        //$preguntas = Pregunta::findOrFail($id);

        //$preguntas = $pregunta;

        return view('preguntas.show', compact('pregunta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(Pregunta $pregunta)
    {
        auth()->user()->authorizeRoles(['admin', 'superadmin']);
        $categorias = CategoriaPregunta::all();
        return view('preguntas.edit', compact('pregunta', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pregunta $pregunta)
    {
        auth()->user()->authorizeRoles(['admin', 'superadmin']);
        $reglas = [
            'detalle'=>'required|string|min:5|max:100',
            'categoria_pregunta_id'=>'required|string|min:1|max:100'
        ];

        $mensajes = [
            'string'=>'El campo debe ser un texto',
            'min'=>'El campo debe tener un minimo de :min caracteres',
            'max'=>'El campo debe tener un máximo de :max caracteres',
            'unique'=>'Esta pregunta ya está registrada en la Base de Datos'
        ];

        $this->validate($request, $reglas, $mensajes);

        $pregunta->update($request->all());
        //return back();
        return redirect()->route('preguntas.show', compact('pregunta'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregunta $pregunta)
    {
        auth()->user()->authorizeRoles(['admin', 'superadmin']);
        $pregunta->delete();
        return redirect()->route('preguntas.index');
    }
}
