@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row mb-4">
        <div class="col">
            @component('components.card')
                @slot('header')
                    Actualizar datos de la pregunta
                @endslot

                <div class="card-body">
                    <form method="POST" action="{{ route('preguntas.update', $pregunta->id) }}" role="form">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="detalle" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Pregunta') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <input id="detalle" type="text"
                                    class="form-control @error('detalle') is-invalid @enderror" name="detalle"
                                    value="{{ $pregunta->detalle }}"  autocomplete="detalle" autofocus>

                                @if ($errors->has('detalle'))
                                    <div class="invalid-feedback">{{ $errors->first('detalle') }}</div>
                                @else
                                    <div class="form-text small"></div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categoria_pregunta_id" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Categoría') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">

                                <select name="categoria_pregunta_id" class="form-control @error('categoria_pregunta_id') is-invalid @enderror" id="categoria_pregunta_id" required>
                                    @foreach ($categorias as $categoria)

                                        <option value="{{ $categoria->id }}" {{ $categoria->id == old('categoria_pregunta_id') || $categoria->id == $pregunta->categoriaPregunta->id ? "selected" : "" }}>
                                            {{ $categoria->detalle }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('detalle'))
                                    <div class="invalid-feedback">{{ $errors->first('detalle') }}</div>
                                @else
                                    <div class="form-text small"></div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0 float-right">
                            <div class="col">
                                <a href="{{ route('preguntas.show', $pregunta->id) }}" class="btn btn-dark">Atrás</a>
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
