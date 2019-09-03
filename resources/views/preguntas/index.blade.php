@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">

                    <div class="card-header d-flex align-items-center justify-content-between">
                            <h3 class="float-left">Listado de preguntas</h3>
                            <a href="{{ route('preguntas.create') }}" class="btn btn-warning align-self-center">Añadir una nueva Pregunta</a>
                    </div>


                <div class="card-body">
                <div class="table-responsive">
                    <table id="mytable" class="table table-hover">
                        <thead class="thead-dark">
                            <th>#</th>
                            <th>Preguntas</th>
                            <th>Categoría ID</th>

                            <th class="text-left">Ver</th>
                            <th class="text-left">Editar</th>
                            <th class="text-left">Borrar</th>
                        </thead>
                        <tbody>
                            @if($preguntas->count())
                            @foreach($preguntas as $pregunta)
                                <tr>
                                    <td class="align-middle">{{$pregunta->id}}</td>
                                    <td class="align-middle">{{$pregunta->detalle}}</td>
                                    <td class="align-middle">{{$pregunta->categoriaPregunta->detalle}}</td>

                                    <td  class="align-middle">
                                        {{-- <div class="float-right"> --}}
                                       <a class="btn btn-warning btn-sm m-0" href="{{ route('preguntas.show', $pregunta->id) }}">Detalle</a>
                                    </td>  <td  class="align-middle">
                                        <a class="btn btn-outline-warning btn-sm m-0" href="{{ route('preguntas.edit', $pregunta->id) }}">Editar</a>
                                    </td>  <td  class="align-middle">
                                       <form class="d-inline" action="{{ route('preguntas.destroy', $pregunta->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            {{-- Aca hay que meter un Modal/Alert que pida confirmacion antes de enviar --}}
                                            <button class="btn btn-dark btn-sm" type="submit">Eliminar</button>
                                        </form>
                                    {{-- </div> --}}
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="12">No hay registros cargados.</td>
                                </tr>
                                @endif
                            </tbody>

                        </table>
                        {{ $preguntas->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
