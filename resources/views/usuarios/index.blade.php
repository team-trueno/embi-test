@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card card-border-color card-border-color-primary shadow">

                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="float-left">Listado de usuarios</h4>
                    <a href="{{ route('preguntas.create') }}" class="btn btn-warning align-self-center">Añadir Usuario</a>
                </div>

                <div class="card-body">
                <div class="table-responsive">
                    <table id="mytable" class="table table-hover">
                        <thead class="thead-dark">
                            <th>Avatar</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th class="d-none d-md-table-cell">Email</th>
                            <th class="d-none d-md-table-cell">Usuario</th>
                            <th class="d-none d-lg-table-cell">Fecha Nacimiento</th>
                            <th class="d-none d-lg-table-cell">País</th>
                            <th class="text-center t-min">Acciones</th>
                        </thead>

                        <tbody>
                            @forelse ($usuarios as $usuario)
                            <tr>
                                <td class="align-middle">
                                    <img src="{{ asset('storage/img/avatars/'.$usuario->avatar) }}" alt="">
                                </td>
                                <td class="align-middle">{{ $usuario->name }}</td>
                                <td class="align-middle">{{ $usuario->apellido }}</td>
                                <td class="align-middle d-none d-md-table-cell">{{ $usuario->email }}</td>
                                <td class="align-middle d-none d-md-table-cell">{{ $usuario->usuario }}</td>
                                <td class="align-middle d-none d-lg-table-cell">{{ $usuario->fecha_nac }}</td>
                                <td class="align-middle d-none d-lg-table-cell">{{ $usuario->pais }}</td>
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
