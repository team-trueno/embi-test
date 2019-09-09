@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h3 class="float-left">Consulta de Usuarios</h3>
                </div>

                <div class="card-body">
                <div class="table-responsive">
                    <table id="mytable" class="table table-hover">
                        <thead class="thead-dark">
                            <th>Nombre</th>
                            <th>E-mail</th>
                            <th>Asunto</th>
                            <th>Mensaje</th>
                            <th class="text-left">Ver</th>
                            <th class="text-left">Borrar</th>
                        </thead>

                        <tbody>
                            @forelse ($contactos as $contacto)
                                <tr>
                                    <td class="align-middle">{{$contacto->nombre}}</td>
                                    <td class="align-middle">{{$contacto->email}}</td>
                                    <td class="align-middle">{{$contacto->asunto}}</td>
                                    <td class="align-middle">{{$contacto->mensaje}}</td>
                                    <td  class="align-middle">
                                        {{-- <div class="float-right"> --}}
                                       <a class="btn btn-warning btn-sm m-0" href="{{ route('contactos.show', $contacto->id) }}">Detalle</a>
                                    </td> 
                                    <td  class="align-middle">
                                       <form class="d-inline" action="{{ route('contactos.destroy', $contacto->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            {{-- Aca hay que meter un Modal/Alert que pida confirmacion antes de enviar --}}
                                            <button class="btn btn-dark btn-sm" type="submit">Eliminar</button>
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