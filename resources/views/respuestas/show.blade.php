@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"><h3>Detalles de la respuesta "{{ $respuesta->detalle }}"</h3></div>
                <div class="card-body">
                    <p>Respuesta: {{ $respuesta->detalle }}</p>
                    <p>Correcta: {{ $respuesta->correcta }}</p>
                    <p>Pregunta ID: {{ $respuesta->pregunta_id }}</p>
                    <p>Pregunta Texto: {{ $respuesta->pregunta->detalle }}</p>
                </div>
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <a href="{{ route('respuestas.index') }}" class="btn btn-dark">Atrás</a>
            </div>
            <br>
            <div class="col-md-8 offset-md-4">
                <a class="btn btn-outline-warning btn-xs" href="{{ route('respuestas.edit', $respuesta->id) }}">Editar</a>
            </div>
        </div>
    </div>
</div>
@endsection
