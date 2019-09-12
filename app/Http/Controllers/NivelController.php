<?php

namespace App\Http\Controllers;

use App\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        auth()->user()->authorizeRoles(['admin', 'superadmin']);
        $niveles = Nivel::paginate(15);
        return view('niveles.index', compact('niveles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        auth()->user()->authorizeRoles(['admin', 'superadmin']);
        return view('niveles.create');
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
            'nombre'=>'required|string|min:1|unique:niveles,nombre',
            'puntos_superar'=>'required|integer|min:1'
        ];

        $mensajes = [
            'string'=>'El campo debe ser un texto',
            'min'=>'El campo debe tener un minimo de :min caracteres',
            'max'=>'El campo debe tener un máximo de :max caracteres',
            'unique'=>'Este nombre de nivel ya está registrado en la Base de Datos'
        ];

        $this->validate($request, $reglas, $mensajes);
        Nivel::create($request->all());
        return redirect()->route('niveles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function show(Nivel $nivel)
    {
        auth()->user()->authorizeRoles(['admin', 'superadmin']);
        return view('niveles.show', compact('nivel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function edit(Nivel $nivel)
    {
        auth()->user()->authorizeRoles(['admin', 'superadmin']);
        return view('niveles.edit', compact('nivel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nivel $nivel)
    {
        auth()->user()->authorizeRoles(['admin', 'superadmin']);
        $reglas = [
            'nombre'=>'string|min:1',
            'puntos_superar'=>'integer|min:1'
        ];

        $mensajes = [
            'string'=>'El campo debe ser un texto',
            'integer'=>'El campo debe ser un número entero',
            'min'=>'El campo debe tener un minimo de :min caracteres'
        ];

        $this->validate($request, $reglas, $mensajes);

        $nivel->update($request->all());

        return redirect()->route('niveles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nivel $nivel)
    {
        auth()->user()->authorizeRoles(['admin', 'superadmin']);
        $nivel->delete();
        return redirect()->route('niveles.index');
    }
}
