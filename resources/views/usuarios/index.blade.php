@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-border-color card-border-color-primary shadow">

                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="float-left">Listado de usuarios</h4>
                </div>

                <div class="card-body">
                <div class="table-responsive">
                    <table id="mytable" class="table table-hover">
                        <thead class="thead-dark">
                            <th>Nombre</th>
                            <th>Avatar</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Usuario</th>
                            <th>Fecha Nacimiento</th>
                            <th>País</th>
                            <th class="text-center t-min">Acciones</th>
                        </thead>

                        <tbody>
                                @forelse ($usuarios as $usuario)
                                <tr>
                                    <td class="align-middle">{{$usuario->name}}</td>
                                    <td class="align-middle"><img src="{{ asset('storage/avatars/',$usuario->avatar) }}" alt=""></td>
                                    <td class="align-middle">{{$usuario->apellido}}</td>
                                    <td class="align-middle">{{$usuario->email}}</td>
                                    <td class="align-middle">{{$usuario->usuario}}</td>
                                    <td class="align-middle">{{$usuario->fecha_nac}}</td>
                                    <td class="align-middle">{{$usuario->pais}}</td>
                                    <td  class="align-middle d-flex justify-content-between">
                                            {{-- <div class="float-right"> --}}
                                           <a class="btn btn-warning btn-sm" href="{{ route('usuarios.show', $usuario->id) }}"><i class="fas fa-eye d-lg-none"></i><span class="d-none d-lg-block">Detalle</span></a>
    
    
                                            <a class="btn btn-outline-warning btn-sm mr-1 ml-1" href="{{ route('usuarios.edit', $usuario->id) }}"><i class="fas fa-edit d-lg-none"></i><span class="d-none d-lg-block">Editar</span></a>
    
    
                                           <form class="d-inline" action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
    
                                                {{-- Aca hay que meter un Modal/Alert que pida confirmacion antes de enviar --}}
                                                <button class="btn btn-dark btn-sm" type="submit"><i class="fas fa-trash-alt d-lg-none"></i><span class="d-none d-lg-block">Eliminar</span></button>
                                            </form>
                                        {{-- </div> --}}
                                    </td>                    
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12">No hay registros cargados.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $usuarios->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection