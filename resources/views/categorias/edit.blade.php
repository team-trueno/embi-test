@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row mb-4 justify-content-center">
        <div class="col-12 col-md-8">
            @component('components.card')
                @slot('header')
                    Actualizar datos de la categoría
                @endslot

                <div class="card-body">
                    <form method="POST" action="{{ route('categorias.update', $categoria->id) }}" role="form">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="detalle" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Nombre de la Categoría') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <input id="detalle" type="text"
                                    class="form-control @error('detalle') is-invalid @enderror" name="detalle"
                                    value="{{ $categoria->detalle }}"  autocomplete="detalle" autofocus>

                                @if ($errors->has('detalle'))
                                    <div class="invalid-feedback">{{ $errors->first('detalle') }}</div>
                                @else
                                    <div class="form-text small"></div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0 float-right">
                            <div class="col">
                                <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-dark">Atrás</a>
                                <button type="submit" class="btn btn-info">
                                    {{ __('Actualizar') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            @endcomponent
        </div>
    </div>
</div>
@endsection









@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                <h3>Actualizar datos de la categoría "{{ $categoria->detalle }}"</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('categorias.update', $categoria->id) }}" role="form">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="detalle"
                                class="col-md-4 col-form-label text-md-right">{{ __('Categoría') }}</label>

                            <div class="col-md-6">
                                <input id="detalle" type="text"
                                    class="form-control @error('detalle') is-invalid @enderror" name="detalle"
                                    value="{{ $categoria->detalle }}" required autocomplete="detalle" autofocus>

                                @error('detalle')
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

                                <a href="{{ route('categorias.index') }}" class="btn btn-dark">Atrás</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
