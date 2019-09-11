@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row mb-4 justify-content-center">
        <div class="col-12 col-md-8">
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
                                @if ($pregunta->completa)
                                    <span class="btn btn-success btn-sm mr-2">Completo</span>
                                @else
                                    {{-- <span class="badge badge-danger mr-2">Incompleto</span> --}}
                                    <span class="btn btn-danger btn-sm mr-2">Incompleto</span>
                                @endif
                                @if ($pregunta->activa)
                                    <span class="btn btn-success btn-sm">Activa</span>
                                @else
                                    <span class="btn btn-danger btn-sm">Inactiva</span>
                                @endif
                            </div>
                        </div>
                            </fieldset>
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

    @if ($pregunta->completa)
    <div class="row mb-4 justify-content-center">
        <div class="col-12 col-md-8">
            @component('components.card')
                @slot('header')
                    Respuestas
                @endslot
                <div class="card-body">
                    <form action="/preguntas/{{ $pregunta->id}}/respuestas" method="POST">
                        @csrf
<fieldset disabled="disabled">
                        <div class="form-group row">
                            <label for="detalle[]" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Respuesta #1') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <div class="input-group">
                                    <input id="detalle[]" type="text"
                                        class="form-control @error('detalle.0') is-invalid @enderror" name="detalle[]"
                                        value="{{ $pregunta->respuestas[0]->detalle }}"  autocomplete="detalle[]" autofocus>

                                    @if ($errors->has('detalle.0'))
                                        <div class="invalid-feedback">{{ $errors->first('detalle.0') }}</div>
                                    @else
                                        <div class="form-text small"></div>
                                    @endif

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <input class="" type="radio" name="gridRadios" id="gridRadios0" {{ $pregunta->respuestas[0]->correcta ? "checked" : "" }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detalle[]" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Respuesta #2') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <div class="input-group">
                                    <input id="detalle[]" type="text"
                                        class="form-control @error('detalle.1') is-invalid @enderror" name="detalle[]"
                                        value="{{ $pregunta->respuestas[1]->detalle }}"  autocomplete="detalle[]" autofocus>

                                        @if ($errors->has('detalle.1'))
                                            <div class="invalid-feedback">{{ $errors->first('detalle.1') }}</div>
                                        @else
                                            <div class="form-text small"></div>
                                        @endif

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <input class="" type="radio" name="gridRadios" id="gridRadios0" {{ $pregunta->respuestas[1]->correcta ? "checked" : "" }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detalle[]" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Respuesta #3') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <div class="input-group">
                                    <input id="detalle[]" type="text"
                                        class="form-control @error('detalle.2') is-invalid @enderror" name="detalle[]"
                                        value="{{ $pregunta->respuestas[2]->detalle }}"  autocomplete="detalle[]" autofocus>

                                        @if ($errors->has('detalle.2'))
                                            <div class="invalid-feedback">{{ $errors->first('detalle.2') }}</div>
                                        @else
                                            <div class="form-text small"></div>
                                        @endif

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <input class="" type="radio" name="gridRadios" id="gridRadios0" {{ $pregunta->respuestas[2]->correcta ? "checked" : "" }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detalle[]" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Respuesta #4') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <div class="input-group">
                                    <input id="detalle[]" type="text"
                                        class="form-control @error('detalle.3') is-invalid @enderror" name="detalle[]"
                                        value="{{ $pregunta->respuestas[3]->detalle }}"  autocomplete="detalle[]" autofocus>

                                        @if ($errors->has('detalle.3'))
                                            <div class="invalid-feedback">{{ $errors->first('detalle.3') }}</div>
                                        @else
                                            <div class="form-text small"></div>
                                        @endif

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <input class="" type="radio" name="gridRadios" id="gridRadios0" {{ $pregunta->respuestas[3]->correcta ? "checked" : "" }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                        <div class="form-group row mb-0 float-right">
                            <div class="col">
                                <a class="btn btn-secondary" href="/preguntas/{{ $pregunta->id }}/respuestas/edit">
                                    {{ __('Editar') }}
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            @endcomponent
        </div>
    </div>
    @else



    <div class="row mb-4 justify-content-center">
        <div class="col-12 col-md-8">
            @component('components.card')
                @slot('header')
                    Respuestas
                @endslot
                <div class="card-body">
                    <form action="/preguntas/{{ $pregunta->id}}/respuestas" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="detalle[]" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Respuesta #1') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <div class="input-group">
                                    <input id="detalle[]" type="text"
                                        class="form-control @error('respuestas.0.detalle') is-invalid @enderror" name="respuestas[0][detalle]"
                                        value="{{ old('respuestas.0.detalle') }}"  autocomplete="detalle[]" autofocus>



                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <input class="" type="radio" name="gridRadios" id="gridRadios0" value="0">
                                        </div>
                                    </div>
                                </div>
                                {{-- @if ($errors->has('detalle.0'))
                                <div class="invalid-feedback">{{ $errors->first('detalle.0') }}</div>
                            @else
                                <div class="form-text small"></div>
                            @endif --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detalle[]" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Respuesta #2') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <div class="input-group">
                                    <input id="detalle[]" type="text"
                                        class="form-control @error('respuestas.1.detalle') is-invalid @enderror" name="respuestas[1][detalle]"
                                        value="{{ old('respuestas.1.detalle') }}"  autocomplete="detalle[]" autofocus>

                                        {{-- @if ($errors->has('detalle.1'))
                                            <div class="invalid-feedback">{{ $errors->first('detalle.1') }}</div>
                                        @else
                                            <div class="form-text small"></div>
                                        @endif --}}

                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <input class="" type="radio" name="gridRadios" id="gridRadios1" value="1">
                                            </div>
                                        </div>

                                                                            {{-- @if ($errors->has('detalle.1'))
                                            <div class="invalid-feedback">{{ $errors->first('detalle.1') }}</div>
                                        @else
                                            <div class="form-text small"></div>
                                        @endif --}}
                                    @error('detalle.1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detalle[]" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Respuesta #3') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <div class="input-group">
                                    <input id="detalle[]" type="text"
                                        class="form-control @error('respuestas.2.detalle') is-invalid @enderror" name="respuestas[2][detalle]"
                                        value="{{ old('respuestas.2.detalle') }}"  autocomplete="detalle[]" autofocus>



                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <input class="" type="radio" name="gridRadios" id="gridRadios2" value="2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detalle[]" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Respuesta #4') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <div class="input-group">
                                    <input id="detalle[]" type="text"
                                        class="form-control @error('respuestas.3.detalle') is-invalid @enderror" name="respuestas[3][detalle]"
                                        value="{{ old('respuestas.3.detalle') }}"  autocomplete="detalle[]" autofocus>

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <input class="" type="radio" name="gridRadios" id="gridRadios3" value="3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 float-right">
                            <div class="col">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            @endcomponent
        </div>
    </div>
    @endif
</div>
@endsection
