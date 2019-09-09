@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">

                <div class="card-header d-flex align-items-center justify-content-between">
                    <h3 class="float-left">Listado de Niveles</h3>
                    <a href="{{ route('niveles.create') }}" class="btn btn-warning align-self-center">Añadir un nuevo Nivel</a>
                </div>


                <div class="card-body">
                <div class="table-responsive">
                    <table id="mytable" class="table table-hover">
                        <thead class="thead-dark">
                            <th>Nombre</th>
                            <th>Puntos a Superar</th>

                            <th class="text-left">Ver</th>
                            <th class="text-left">Editar</th>
                            <th class="text-left">Borrar</th>
                        </thead>
                        <tbody>
                            @forelse ($niveles as $nivel)
                            <tr>
                                <td class="align-middle">{{$nivel->nombre}}</td>
                                <td class="align-middle">{{$nivel->puntos_superar}}</td>
                                <td  class="align-middle">
                                    {{-- <div class="float-right"> --}}
                                   <a class="btn btn-warning btn-sm m-0" href="{{ route('niveles.show', $nivel->id) }}">Detalle</a>
                                </td> 
                                <td>
                                    <a class="btn btn-outline-warning btn-xs" href="{{ route('niveles.edit', $nivel->id) }}">Editar</a>
                                </td>
                                <td  class="align-middle">
                                   <form class="d-inline" action="{{ route('niveles.destroy', $nivel->id) }}" method="POST">
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
                                <td colspan="12">No hay registros cargados...</td>
                            </tr>
                        @endforelse
                            </tbody>

                        </table>
                        {{ $niveles->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection