@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"><h3>Detalles de la pregunta "{{ $pregunta->detalle }}"</h3></div>
                <div class="card-body">
                    <p>Pregunta: {{ $pregunta->detalle }}</p>
                    <p>Categoría ID: {{ $pregunta->categoria_pregunta_id }}</p>

                    <ul>
                        @foreach ($pregunta->respuestas as $respuesta)
                        <li>{{ $respuesta->detalle }} {{ $respuesta->correcta }} <a class="btn btn-warning btn-xs" href="{{ route('respuestas.show', $respuesta->id) }}">Ver</a></li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <a href="{{ route('preguntas.index') }}" class="btn btn-dark">Atrás</a>
            </div>
            <br>
            <div class="col-md-8 offset-md-4">
                <a class="btn btn-outline-warning btn-xs" href="{{ route('preguntas.edit', $pregunta->id) }}">Editar</a>
            </div>
        </div>
    </div>
</div>
@endsection
