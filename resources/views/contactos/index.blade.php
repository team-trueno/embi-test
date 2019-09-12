@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card card-border-color card-border-color-primary shadow">

                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="float-left">Consultas de Usuarios</h4>
                    <a href="{{ route('contactos.create') }}" class="btn btn-warning align-self-center">Añadir Consulta</a>
                </div>

                <div class="card-body">
                <div class="table-responsive">
                    <table id="mytable" class="table table-hover">
                        <thead class="thead-dark">
                            <th>Nombre</th>
                            <th>E-mail</th>
                            <th>Asunto</th>
                            <th class="d-none d-md-table-cell">Mensaje</th>
                            <th class="text-center t-min">Acciones</th>
                            {{-- <th class="text-left">Ver</th>
                            <th class="text-left">Borrar</th> --}}
                        </thead>

                        <tbody>
                            @forelse ($contactos as $contacto)
                                <tr>
                                    <td class="align-middle">{{ $contacto->nombre }}</td>
                                    <td class="align-middle">{{ $contacto->email }}</td>
                                    <td class="align-middle">{{ $contacto->asunto }}</td>
                                    <td class="align-middle d-none d-md-table-cell">{{ $contacto->mensaje }}</td>
                                    <td  class="align-middle d-flex justify-content-between">
                                        {{-- <div class="float-right"> --}}
                                        <a class="btn btn-warning btn-sm mr-1" href="{{ route('contactos.show', $contacto->id) }}"><i class="fas fa-eye d-lg-none"></i><span class="d-none d-lg-block">Detalle</span></a>
                                        {{-- <a class="btn btn-warning btn-sm m-0" href="{{ route('contactos.show', $contacto->id) }}">Detalle</a> --}}

                                       <form class="d-inline" action="{{ route('contactos.destroy', $contacto->id) }}" method="POST">
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
                                    <td colspan="12">No hay consultas de usuarios...</td>
                                </tr>
                            @endforelse
                        </tbody>
                        </table>
                        {{ $contactos->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
