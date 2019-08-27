@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"><h3>Detalles de la categoría "{{ $categoria->detalle }}"</h3></div>
                <div class="card-body">
                    <p>Categoría: {{$categoria->detalle}}</p>
                </div>
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <a href="{{ route('categorias.index') }}" class="btn btn-dark">Atrás</a>
            </div>
            <br>
            <div class="col-md-8 offset-md-4">
                <a class="btn btn-outline-warning btn-xs" href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>
            </div>
        </div>
    </div>
</div>
@endsection
