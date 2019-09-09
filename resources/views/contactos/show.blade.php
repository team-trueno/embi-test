@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"><h3>Consulta realizada por "{{$contacto->nombre}}"</h3></div>
                <div class="card-body">
                    <p><b><u>E-mail:</u></b> {{$contacto->email}} </p>
                    <p><b><u>Asunto:</u></b> {{$contacto->asunto}} </p>
                    <p><b><u>Mensaje:</u></b> {{$contacto->mensaje}} </p>
                </div>
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <a href="{{ route('contactos.index') }}" class="btn btn-dark">Atrás</a>
            </div>
        </div>
    </div>
</div>
@endsection