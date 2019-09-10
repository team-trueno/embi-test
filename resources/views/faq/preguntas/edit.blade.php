@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row mb-4 justify-content-center">
        <div class="col-12 col-md-8">
            @component('components.card')
                @slot('header')
                    Actualizar datos de la pregunta
                @endslot

                <div class="card-body">
                    <form method="POST" action="{{ route('faq.preguntas.update', $pregunta->id) }}" role="form">
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
                            <label for="detalle" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Respuesta') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <input id="respuesta" type="text"
                                    class="form-control @error('respuesta') is-invalid @enderror" name="respuesta"
                                    value="{{ $pregunta->respuesta }}"  autocomplete="respuesta" autofocus>

                                @if ($errors->has('respuesta'))
                                    <div class="invalid-feedback">{{ $errors->first('respuesta') }}</div>
                                @else
                                    <div class="form-text small"></div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="topico" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Tópico') }}
                            </label>
                    
                            <div class="col-12 col-sm-9 col-lg-9">
                                <select id="faq_topico_id" class="form-control @error('topico') is-invalid @enderror" name="faq_topico_id" required>
                                    @foreach ($topicos as $topico)
                                <option value="{{ $topico->id }}">
                                        {{$topico->detalle}}
                                    </option>
                                    @endforeach
                    
                                </select>
                                @error('topico')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 float-right">
                            <div class="col">
                                <button type="submit" class="btn btn-info">
                                    {{ __('Actualizar') }}
                                </button>
                                <a href="{{ route('faq.preguntas.show', $pregunta->id) }}" class="btn btn-dark">Atrás</a>
                            </div>
                        </div>

                    </form>
                </div>
            @endcomponent
        </div>
    </div>
</div>
@endsection
