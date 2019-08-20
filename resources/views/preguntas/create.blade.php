@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    <h3>Nueva Pregunta</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('preguntas.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="pregunta"
                                class="col-md-4 col-form-label text-md-right">{{ __('Pregunta') }}</label>

                            <div class="col-md-6">
                                <input id="pregunta" type="text"
                                    class="form-control @error('pregunta') is-invalid @enderror" name="pregunta"
                                    value="{{ old('pregunta') }}" required autocomplete="pregunta" autofocus>

                                @error('pregunta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="categoria_pregunta_id"
                                class="col-md-4 col-form-label text-md-right">{{ __('Categoría de la pregunta') }}</label>

                            <div class="col-md-6">
                                <input id="categoria_pregunta_id" type="text"
                                    class="form-control @error('categoria_pregunta_id') is-invalid @enderror" name="categoria_pregunta_id"
                                    value="{{ old('categoria_pregunta_id') }}" required autocomplete="categoria_pregunta_id">

                                @error('categoria_pregunta_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                        {{ __('Guardar') }}
                                </button>

                                <a href="{{ route('preguntas.index') }}" class="btn btn-dark">Atrás</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection