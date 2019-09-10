@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            @component('components.card')
                @slot('header')
                    Detalles de la pregunta
                @endslot
                <div class="card-body">
                    <form action="">
                            <fieldset disabled="disabled">
                        <div class="form-group row">
                            <label for="detalle[]" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Pregunta') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <input type="text" class="form-control" value="{{ $pregunta->detalle }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detalle[]" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Categoría') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <input type="text" class="form-control" value="{{ $pregunta->categoriaPregunta->detalle }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detalle[]" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Estado') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9 d-flex align-items-center">
                                @if ($pregunta->respuestas->count() === 4)
                                    <span class="badge badge-success">Completo</span>
                                @else
                                    <span class="badge badge-danger">Incompleto</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0 float-right">
                            <div class="col">
                                <a class="btn btn-secondary" href="{{ route('preguntas.edit', $pregunta->id) }}">
                                    {{ __('Editar') }}
                                </a>
                                {{-- <button type="button" class="btn btn-secondary">
                                    {{ __('Editar') }}
                                </button> --}}
                            </div>
                        </div>
                    </fieldset>
                    </form>
                    {{-- <p>Pregunta: {{ $pregunta->detalle }}</p>
                    <p>Categoría: {{ $pregunta->categoriaPregunta->detalle }}</p>
                    <p>Estado
                        @if ($pregunta->respuestas->count() === 4)

                        @endif
                    </p> --}}
                    {{-- <ul>
                        @forelse ($pregunta->respuestas as $respuesta)
                            <li>
                                {{ $respuesta->detalle }} – {{ $respuesta->correcta }}
                                <a class="btn btn-warning btn-xs" href="{{ route('respuestas.show', $respuesta->id) }}">Ver</a>
                            </li>
                        @empty
                            <p>No hay respuesta aún</p>
                        @endforelse
                    </ul> --}}
                </div>
            @endcomponent
        </div>
    </div>

    <div class="row mb-5">
        <div class="col">
            @component('components.card')
                @slot('header')
                    Actualizar respuestas
                @endslot
                <div class="card-body">

                    <form action="/preguntas/{{ $pregunta->id}}/respuestas" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="detalle[]" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Respuesta #1') }}
                            </label>

                            <div class="col-12 col-sm-6 col-lg-9">
                                <input id="detalle[]" type="text"
                                    class="form-control @error('respuestas.0.detalle') is-invalid @enderror" name="respuestas[0][detalle]"
                                    value="{{ $pregunta->respuestas[0]->detalle }}"  autocomplete="detalle[]" autofocus>
                                <input value="{{ $pregunta->respuestas[0]->id }}" type="hidden" name="respuestas[0][id]">
                                    @if ($errors->has('respuestas.0.detalle'))
                                        <div class="invalid-feedback">{{ $errors->first('respuestas.0.detalle') }}</div>
                                    @else
                                        <div class="form-text small"></div>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detalle[]" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Respuesta #2') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <input id="detalle[]" type="text"
                                    class="form-control @error('respuestas.1.detalle') is-invalid @enderror" name="respuestas[1][detalle]"
                                    value="{{ $pregunta->respuestas[1]->detalle }}"  autocomplete="detalle[]" autofocus>
                                    <input value="{{ $pregunta->respuestas[1]->id }}" type="hidden" name="respuestas[1][id]">
                                    @if ($errors->has('respuestas.1.detalle'))
                                        <div class="invalid-feedback">{{ $errors->first('respuestas.1.detalle') }}</div>
                                    @else
                                        <div class="form-text small"></div>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detalle[]" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Respuesta #3') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <input id="detalle[]" type="text"
                                    class="form-control @error('respuestas.2.detalle') is-invalid @enderror" name="respuestas[2][detalle]"
                                    value="{{ $pregunta->respuestas[2]->detalle }}"  autocomplete="respuestas.2.detalle" autofocus>
                                    <input value="{{ $pregunta->respuestas[2]->id }}" type="hidden" name="respuestas[2][id]">
                                    @if ($errors->has('respuestas.2.detalle'))
                                        <div class="invalid-feedback">{{ $errors->first('respuestas.2.detalle') }}</div>
                                    @else
                                        <div class="form-text small"></div>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detalle[]" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Respuesta #4') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <input id="respuestas.3.detalle" type="text"
                                    class="form-control @error('respuestas.3.detalle') is-invalid @enderror" name="respuestas[3][detalle]"
                                    value="{{ $pregunta->respuestas[3]->detalle }}"  autocomplete="respuestas.3.detalle" autofocus>
                                    <input value="{{ $pregunta->respuestas[3]->id }}" type="hidden" name="respuestas[3][id]">
                                    @if ($errors->has('respuestas.3.detalle'))

                                        <div class="invalid-feedback">{{ $errors->first('respuestas.3.detalle') }}</div>
                                    @else
                                        <div class="form-text small"></div>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0 float-right">
                            <div class="col">
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