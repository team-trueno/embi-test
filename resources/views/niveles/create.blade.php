@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row mb-4 justify-content-center">
        <div class="col-12 col-md-8">
            @component('components.card')
            @slot('header')
            Nuevo nivel
            @endslot

            <div class="card-body">
                <form method="POST" action="{{ route('niveles.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="nombre" class="col-12 col-sm-3 col-form-label text-sm-right">
                            {{ __('Nombre') }}
                        </label>

                        <div class="col-12 col-sm-9 col-lg-9">
                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror"
                                name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                            @if ($errors->has('nombre'))
                            <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                            @else
                            <div class="form-text small"></div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="puntos_superar" class="col-12 col-sm-3 col-form-label text-sm-right">
                            {{ __('Puntos') }}
                        </label>

                        <div class="col-12 col-sm-9 col-lg-9">
                            <input id="puntos_superar" type="text"
                                class="form-control @error('puntos_superar') is-invalid @enderror" name="puntos_superar"
                                value="{{ old('puntos_superar') }}" required autocomplete="puntos_superar" autofocus>

                            @if ($errors->has('puntos_superar'))
                            <div class="invalid-feedback">{{ $errors->first('puntos_superar') }}</div>
                            @else
                            <div class="form-text small"></div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0 float-right">
                        <div class="col">
                            <button type="submit" class="btn btn-warning">
                                {{ __('Guardar') }}
                            </button>

                            <a href="{{ route('niveles.index') }}" class="btn btn-dark">Atrás</a>
                        </div>
                    </div>
                </form>
            </div>
            @endcomponent
        </div>
    </div>
</div>
@endsection
