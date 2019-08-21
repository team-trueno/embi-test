@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left">
                        <h3>Listado de Preguntas</h3><br>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('preguntas.create') }}" class="btn btn-warning">Añadir una nueva Pregunta</a>
                    </div>
                    <br><br>
                </div>
                    <div class="table table-striped">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                                <th>Preguntas</th>
                                <th>Categoría ID</th>
                            </thead>
                            <tbody>
                                @if($preguntas->count()>0)
                                @foreach($preguntas as $pregunta)
                                <tr>
                                    <td>{{$pregunta->pregunta}}</td>
                                    <td>{{$pregunta->categoria_pregunta_id}}</td>
                                    <td>
                                        <a class="btn btn-warning btn-xs" href="{{ action('PreguntaController@show', $pregunta->id) }}">Ver</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-warning btn-xs" href="{{ action('PreguntaController@edit', $pregunta->id) }}">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{action('PreguntaController@destroy', $pregunta->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            
                                            {{-- Aca hay que meter un Modal/Alert que pida confirmacion antes de enviar --}}
                                            <button class="btn btn-dark btn-xs" type="submit">Eliminar</button>
                                        </form>
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
                    </div>
                </div>
                {{ $preguntas->links() }}
            </div>
        </div>
    </div>

</div>

@endsection