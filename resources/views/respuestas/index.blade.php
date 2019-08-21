@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left">
                        <h3>Listado de Respuestas</h3><br>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('respuestas.create') }}" class="btn btn-warning">Añadir una nueva Respuesta</a>
                    </div>
                    <br><br>
                </div>
                    <div class="table table-striped">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                                <th>Respuestas</th>
                                <th>Correcta</th>
                                <th>Pregunta ID</th>                              
                            </thead>
                            <tbody>
                                @if($respuestas->count()>0)
                                @foreach($respuestas as $respuesta)
                                <tr>
                                    <td>{{$respuesta->detalle}}</td>
                                    <td>{{$respuesta->correcta}}</td>
                                    <td>{{$respuesta->pregunta_id}}</td>
                                    <td>
                                        <a class="btn btn-warning btn-xs" href="{{action('RespuestaController@show', $respuesta->id)}}">Ver</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-warning btn-xs" href="{{action('RespuestaController@edit', $respuesta->id)}}">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{action('RespuestaController@destroy', $respuesta->id)}}" method="post">
                                            @csrf
                                            
                                            <input name="_method" type="hidden" value="DELETE">

                                            <button class="btn btn-dark btn-xs" type="submit">Eliminar</button>
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
                {{ $respuestas->links() }}
            </div>
        </div>
    </div>

</div>

@endsection