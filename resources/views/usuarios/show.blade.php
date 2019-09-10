@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-12 col-md-4">
            <div class="card mb-4">
                <div>
                    <img src="{{ asset('img/avatars/',$usuario->avatar) }}" class="card-img-top">
                </div>            
                <div class="card-body text-center">
                    <h3 class="card-title">{{$usuario->name}} {{$usuario->apellido}}</h3>
                    @if ($userParam == 'admin')
                        <span class="badge badge-danger text-uppercase">{{$userParam}}</span>
                    @else
                        <span class="badge badge-primary text-uppercase">{{$userParam}}</span>
                    @endif
                    
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{$usuario->email}}</li>
                    <li class="list-group-item">{{$usuario->usuario}}</li>
                    {{-- Estaría bueno meter la banderita del país acá --}}
                    <li class="list-group-item">{{$usuario->pais}}</li>
                </ul>
                <div class="card-body">
                    <a class="btn btn-warning btn-sm" href="{{ route('usuarios.edit', $usuario->id) }}"><i class="fas fa-edit d-lg-none"></i><span class="d-none d-lg-block">Editar</span></a>
                    <form class="d-inline" action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        {{-- Acá hay que meter un Modal/Alert que pida confirmacion antes de enviar --}}
                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt d-lg-none"></i><span class="d-none d-lg-block">Eliminar</span></button>
                    </form>
                </div>
            </div>            
        </div>

        <div class="col-12 col-md-8">
            <div class="card mb-4">
            <div class="card-header"><h3>Datos generales</h3></div>
                <div class="card-body col-md-8">
                    <p>Nombre: {{$usuario->name}}</p>
                    <p>Apellido: {{$usuario->apellido}}</p>
                    <p>E-mail: {{$usuario->email}}</p>
                    <p>Usuario: {{$usuario->usuario}}</p>
                    <p>Fecha Nacimiento: {{$usuario->fecha_nac}}</p>
                    <p>País: {{$usuario->pais}}</p>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-dark btn-sm">Atrás</a>
                </div>
            </div>

            @if ($userParam == 'jugador')
            <div class="card mb-4">
                <div class="card-header"><h3>Datos Jugador</h3></div>
                <div class="card-body col-md-8">
                    {{-- $user->jugador->nivel ó jugador->nivel --}}
                    <p>Nivel: 4</p>
                    {{-- $user->jugador->puntos ó jugador->puntos --}}
                    <p>Puntos: 1250</p>
                    {{-- realizar una consulta de su posición en el ranking gral --}}
                    <p>Posición en el ranking: 1°</p>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-dark btn-sm">Atrás</a>
                </div>
            </div>
            @else
            <div class="card mb-4">
                <div class="card-header"><h3>Datos Admin</h3></div>
                <div class="card-body col-md-8">
                    <p>Nombre: {{$usuario->name}}</p>
                    <p>Apellido: {{$usuario->apellido}}</p>
                    <p>E-mail: {{$usuario->email}}</p>
                    <p>Usuario: {{$usuario->usuario}}</p>
                    <p>Fecha Nacimiento: {{$usuario->fecha_nac}}</p>
                    <p>País: {{$usuario->pais}}</p>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-dark btn-sm">Atrás</a>
                </div>
            </div>
            @endif
        </div>

    </div>
</div>
@endsection