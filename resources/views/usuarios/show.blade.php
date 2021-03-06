@extends('layouts.master')
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-12 col-md-4">
            <div class="card mb-4">
                {{-- <div> --}}
                    <img src="{{ asset('storage/img/avatars/'.$usuario->avatar) }}" class="card-img-top">
                {{-- </div> --}}
                <div class="card-body text-center">
                    <h3 class="card-title">{{$usuario->name}} {{$usuario->apellido}}</h3>
                    @if ($usuario->hasRole('admin'))
                        <span class="btn btn-danger btn-sm text-uppercase">Admin</span>
                    @else
                        <span class="btn btn-warning btn-sm text-uppercase">Jugador</span>
                    @endif

                    @if ($usuario->activo)
                        <span class="btn btn-success btn-sm text-uppercase">Activo</span>
                    @else
                        <span class="btn btn-danger btn-sm text-uppercase">Inactivo</span>
                    @endif

                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">
                        @if ($usuario->hasJugador())
                        <span class="btn btn-dark btn-lg">{{ $usuario->jugador->nivel->nombre }}</span>
                        <span class="btn btn-secondary btn-lg">Puntos <span class="badge badge-light">{{ $usuario->jugador->puntos }}</span></span>
                        @endif

                    </li>
                    <li class="list-group-item">{{ $usuario->email }}</li>
                    <li class="list-group-item">{{ $usuario->usuario }}</li>
                    {{-- Estaría bueno meter la banderita del país acá --}}
                    <li class="list-group-item">{{ $usuario->pais }}</li>
                </ul>
                <div class="card-body">
                    <a class="btn btn-warning" href="{{ route('usuarios.edit', $usuario->id) }}"><i class="fas fa-edit d-lg-none"></i><span class="d-none d-lg-block">Editar</span></a>
                    @if ($usuario->activo)
                    <form id="form" class="d-inline" action="{{ route('perfiles.destroy', $usuario->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        {{-- Acá hay que meter un Modal/Alert que pida confirmacion antes de enviar --}}
                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt d-lg-none"></i><span class="d-none d-lg-block">Desactivar</span></button>
                    </form>
                    @else
                    <form class="d-inline" action="{{ route('perfiles.store', $usuario->id) }}" method="POST">
                        @csrf

                        {{-- Acá hay que meter un Modal/Alert que pida confirmacion antes de enviar --}}
                        <button class="btn btn-success" type="submit"><i class="fas fa-trash-alt d-lg-none"></i><span class="d-none d-lg-block">Activar</span></button>
                    </form>
                    @endif
                    @if ($usuario->hasRole('superadmin'))


                    @if ($usuario->hasRole('admin'))
                    <form id="form" class="d-inline" action="{{ route('admin.destroy', $usuario->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        {{-- Acá hay que meter un Modal/Alert que pida confirmacion antes de enviar --}}
                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt d-lg-none"></i><span class="d-none d-lg-block">DesAdmin</span></button>
                    </form>
                    @else
                    <form class="d-inline" action="{{ route('admin.store', $usuario->id) }}" method="POST">
                        @csrf

                        {{-- Acá hay que meter un Modal/Alert que pida confirmacion antes de enviar --}}
                        <button class="btn btn-success" type="submit"><i class="fas fa-trash-alt d-lg-none"></i><span class="d-none d-lg-block">Adminear</span></button>
                    </form>
                    @endif
                    @endif

                </div>
            </div>
        </div>

        <div class="col-12 col-md-8">
            <div class="card mb-4">
            <div class="card-header"><h3>Datos generales</h3></div>
                <div class="card-body col-md-8">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nombre: {{$usuario->name}}</li>
                        <li class="list-group-item">Apellido: {{$usuario->apellido}}</li>
                        <li class="list-group-item">E-mail: {{$usuario->email}}</li>
                        <li class="list-group-item">Usuario: {{$usuario->usuario}}</li>
                        <li class="list-group-item">Fecha Nacimiento: {{$usuario->fecha_nac}}</li>
                        <li class="list-group-item">País: {{$usuario->pais}}</li>
                </ul>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-dark btn-sm">Atrás</a>
                </div>
            </div>

            @if ($usuario->hasRole('superadmin') || $usuario->hasRole('admin'))
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

            @if ($usuario->hasRole('user'))
            <div class="card mb-4">
                    <div class="card-header"><h3>Datos Jugador</h3></div>
                    <div class="card-body col-md-8">
                            @if ($usuario->hasJugador())
                        {{-- $user->jugador->nivel ó jugador->nivel --}}
                        <p>{{$usuario->jugador->nivel->nombre}}</p>
                        {{-- $user->jugador->puntos ó jugador->puntos --}}
                        <p>Puntos: {{$usuario->jugador->puntos}}</p>
                        @endif
                        {{-- realizar una consulta de su posición en el ranking gral --}}
                        <a href="{{ route('usuarios.index') }}" class="btn btn-dark btn-sm">Atrás</a>
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>

{{-- <script>
    $(document).ready(function(){
        $('#form').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    console.log('Completado');
                    // alert(data); // show response from the php script.
                }
         });
        });
    });
</script> --}}
@endsection
