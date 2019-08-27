@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    <h3>Nueva Respuesta</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('respuestas.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="detalle"
                                class="col-md-4 col-form-label text-md-right">{{ __('Respuesta') }}</label>

                            <div class="col-md-6">
                                <input id="detalle" type="text"
                                    class="form-control @error('detalle') is-invalid @enderror" name="detalle"
                                    value="{{ old('detalle') }}" required autocomplete="detalle" autofocus>

                                @error('detalle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="correcta"
                                class="col-md-4 col-form-label text-md-right">{{ __('Correcta') }}</label>

                            <div class="col-md-6">
                                <input id="correcta" type="text"
                                    class="form-control @error('correcta') is-invalid @enderror" name="correcta"
                                    value="{{ old('correcta') }}" required autocomplete="correcta">

                                @error('correcta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pregunta_id"
                                class="col-md-4 col-form-label text-md-right">{{ __('Pregunta a la cuál responde') }}</label>

                            <div class="col-md-6">
                                <input id="pregunta_id" type="text"
                                    class="form-control @error('pregunta_id') is-invalid @enderror" name="pregunta_id"
                                    value="{{ old('pregunta_id') }}" required autocomplete="pregunta_id">

                                @error('pregunta_id')
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

                                <a href="{{ route('respuestas.index') }}" class="btn btn-dark">Atrás</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection