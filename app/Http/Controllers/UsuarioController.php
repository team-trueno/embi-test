<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $usuarios = User::paginate(10);
        // $usuarios = User::paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => ['string', 'max:255'],
            'apellido' => ['string', 'max:255'],
            'usuario' => ['string', 'max:255'],
            'avatar' => ['image'],
            'pais' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255']
        ];

        $mensajes = [
            'string'=>'El campo :attribute debe ser un texto',
            'min'=>'El campo :attribute debe tener un minimo de :min',
            'max'=>'El campo :attribute debe tener un máximo de :max',
            'numeric'=>'El campo :attribute debe ser un numero',
            'integer'=>'El campo :attribute debe ser un número entero',
            'unique'=>'Este e-mail ya existe'
        ];

        $route = $request['avatar']->store('/public/img/avatars');

        $fileName = basename($route);

        $this->validate($request, $reglas, $mensajes);

        $usuario = new User();

        $usuario->name = $request->name;
        $usuario->apellido = $request->apellido;
        $usuario->usuario = $request->usuario;
        $usuario->avatar = $fileName;
        $usuario->pais = $request->pais;
        $usuario->email = $request->email;

        $usuario->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        $userParam = 'admin';
        return view('usuarios.show', compact('usuario', 'userParam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        //$paises = Countries::all();

        $paises = Countries::all()->pluck('name.common');

        return view('usuarios.edit', compact('usuario', 'paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $reglas = [
            'name' => ['string', 'max:255'],
            'apellido' => ['string', 'max:255'],
            'usuario' => ['string', 'max:255'],
            'avatar' => ['image'],
            'pais' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255']
        ];

        $mensajes = [
            'string'=>'El campo :attribute debe ser un texto',
            'min'=>'El campo :attribute debe tener un minimo de :min',
            'max'=>'El campo :attribute debe tener un máximo de :max',
            'numeric'=>'El campo :attribute debe ser un numero',
            'integer'=>'El campo :attribute debe ser un número entero'
        ];

        $route = $request['avatar']->store('/public/img/avatars');

        $fileName = basename($route);

        $this->validate($request, $reglas, $mensajes);

        /**
         * Ver de pasar al otro formato de UPDATE
         */
        $usuario->update([
            'name' => $request['name'],
            'apellido' => $request['apellido'],
            'usuario' => $request['usuario'],
            'avatar' => $fileName,
            'pais' => $request['pais'],
            'email' => $request['email']
            ]);

        // $usuario->update();

        // $usuario->name = $request->name;
        // $usuario->apellido = $request->apellido;
        // $usuario->usuario = $request->usuario;
        // $usuario->avatar = $fileName;
        // $usuario->pais = $request->pais;
        // $usuario->email = $request->email;

        //$usuario->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        /**
         * El usuario no se borra, se desactiva
         * Si se desactiva el usuario, también hay que desactivar al jugador
         */
        $usuario->delete();
        return redirect()->route('usuarios.index');
    }
}
