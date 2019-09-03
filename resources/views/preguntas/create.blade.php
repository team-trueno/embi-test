@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            @component('components.card')



                @slot('header')
                    Nueva pregunta
                @endslot

                <div class="card-body">
                    <form method="POST" action="{{ route('preguntas.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="detalle"
                                class="col-12 col-md-4 col-form-label">{{ __('Pregunta') }}</label>

                            <div class="col-12 col-md-8">
                                <input id="detalle" type="text"
                                    class="form-control @error('detalle') is-invalid @enderror" name="detalle"
                                    value="{{ old('detalle') }}" required autocomplete="detalle" autofocus>
                                    @if ($errors->has('detalle'))
                                    <div class="invalid-feedback">{{ $errors->first('detalle') }}</div>
                                    @else
                                    <div class="form-text small"></div>
                                @endif
                                {{-- @error('detalle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="categoria_pregunta_id"
                                class="col-md-4 col-form-label">{{ __('Categoría') }}</label>

                            <div class="col-md-8">
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
            @endcomponent
        </div>
    </div>
</div>
@endsection
