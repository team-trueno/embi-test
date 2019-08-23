@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left">
                        <h3>Listado de Categorías</h3><br>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('categorias-preguntas.create') }}" class="btn btn-warning">Añadir una nueva Categoría</a>
                    </div>
                    <br><br>
                </div>
                    <div class="table table-striped">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                                <th>Categoria</th>
                            </thead>
                            <tbody>
                                @if($categoriasPreguntas->count()>0)
                                @foreach($categoriasPreguntas as $categoriasPregunta)
                                <tr>
                                    <td>{{$categoriasPregunta->detalle}}</td>
                                    <td>
                                        <a class="btn btn-warning btn-xs" href="{{action('CategoriaPreguntaController@show', $categoriasPregunta->id)}}">Ver</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-warning btn-xs" href="{{action('CategoriaPreguntaController@edit', $categoriasPregunta->id)}}">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{action('CategoriaPreguntaController@destroy', $categoriasPregunta->id)}}" method="post">
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
                {{ $categoriasPreguntas->links() }}
            </div>
        </div>
    </div>

</div>

@endsection