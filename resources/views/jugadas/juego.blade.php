@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-border-color card-border-color-primary shadow">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4>{{ $pregunta->detalle }}</h4>
                    <a href="{{ route('preguntas.index') }}" class="btn btn-primary align-self-center disabled text-big">00 seg</a>
                </div>
                <div class="card-body">
                    @foreach ($pregunta->respuestas as $respuesta)


                            <button type="button" class="btn btn-primary btn-lg btn-block">{{$respuesta->detalle}}</button>


                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
