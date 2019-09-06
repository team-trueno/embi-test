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

    @if ($pregunta->respuestas->count() === 4)
    <div class="row mb-5">
        <div class="col">
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
                                <input id="detalle[]" type="text"
                                    class="form-control @error('detalle.0') is-invalid @enderror" name="detalle[]"
                                    value="{{ $pregunta->respuestas[0]->detalle }}"  autocomplete="detalle[]" autofocus>

                                    @if ($errors->has('detalle.0'))
                                        <div class="invalid-feedback">{{ $errors->first('detalle.0') }}</div>
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
                                    class="form-control @error('detalle.1') is-invalid @enderror" name="detalle[]"
                                    value="{{ $pregunta->respuestas[1]->detalle }}"  autocomplete="detalle[]" autofocus>

                                    @if ($errors->has('detalle.1'))
                                        <div class="invalid-feedback">{{ $errors->first('detalle.1') }}</div>
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
                                    class="form-control @error('detalle.2') is-invalid @enderror" name="detalle[]"
                                    value="{{ $pregunta->respuestas[2]->detalle }}"  autocomplete="detalle[]" autofocus>

                                    @if ($errors->has('detalle.2'))
                                        <div class="invalid-feedback">{{ $errors->first('detalle.2') }}</div>
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
                                <input id="detalle[]" type="text"
                                    class="form-control @error('detalle.3') is-invalid @enderror" name="detalle[]"
                                    value="{{ $pregunta->respuestas[3]->detalle }}"  autocomplete="detalle[]" autofocus>

                                    @if ($errors->has('detalle.3'))
                                        <div class="invalid-feedback">{{ $errors->first('detalle.3') }}</div>
                                    @else
                                        <div class="form-text small"></div>
                                    @endif
                            </div>
                        </div>
                    </fieldset>
                        <div class="form-group row mb-0 float-right">
                            <div class="col">
                                <a class="btn btn-secondary" href="/preguntas/{{ $pregunta->id}}/respuestas/edit">
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



    <div class="row mb-5">
        <div class="col">
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

                            <div class="col-12 col-sm-6 col-lg-9">
                                <input id="detalle[]" type="text"
                                    class="form-control @error('detalle.0') is-invalid @enderror" name="detalle[]"
                                    value="{{ old('detalle.0') }}"  autocomplete="detalle[]" autofocus>

                                    @if ($errors->has('detalle.0'))
                                        <div class="invalid-feedback">{{ $errors->first('detalle.0') }}</div>
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
                                    class="form-control @error('detalle.1') is-invalid @enderror" name="detalle[]"
                                    value="{{ old('detalle.1') }}"  autocomplete="detalle[]" autofocus>

                                    @if ($errors->has('detalle.1'))
                                        <div class="invalid-feedback">{{ $errors->first('detalle.1') }}</div>
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
                                    class="form-control @error('detalle.2') is-invalid @enderror" name="detalle[]"
                                    value="{{ old('detalle.2') }}"  autocomplete="detalle[]" autofocus>

                                    @if ($errors->has('detalle.2'))
                                        <div class="invalid-feedback">{{ $errors->first('detalle.2') }}</div>
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
                                <input id="detalle[]" type="text"
                                    class="form-control @error('detalle.3') is-invalid @enderror" name="detalle[]"
                                    value="{{ old('detalle.3') }}"  autocomplete="detalle[]" autofocus>

                                    @if ($errors->has('detalle.3'))
                                        <div class="invalid-feedback">{{ $errors->first('detalle.3') }}</div>
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
                            </div>
                        </div>

                    </form>
                </div>
            @endcomponent
        </div>
    </div>
    @endif
</div>






    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
                @component('components.card')
                @slot('header')
                    Detalles de la pregunta
                @endslot

                <div class="card-body">
                    <p>Pregunta: {{ $pregunta->detalle }}</p>
                    <p>Categoría ID: {{ $pregunta->categoria_pregunta_id }}</p>

                    <ul>
                        @foreach ($pregunta->respuestas as $respuesta)
                        <li>{{ $respuesta->detalle }} {{ $respuesta->correcta }} <a class="btn btn-warning btn-xs" href="{{ route('respuestas.show', $respuesta->id) }}">Ver</a></li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <a href="{{ route('preguntas.index') }}" class="btn btn-dark">Atrás</a>
            </div>
            <br>
            <div class="col-md-8 offset-md-4">
                <a class="btn btn-outline-warning btn-xs" href="{{ route('preguntas.edit', $pregunta->id) }}">Editar</a>
            </div>
        </div>
    </div>
    @endcomponent --}}

    {{-- <div class="row">
        <div class="col">
            @component('components.card')
                @slot('header')
                    Respuestas
                @endslot

                <div class="card-body">
                    <form action="/preguntas/{{ $pregunta->id}}/respuestas" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="detalle[]" class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('Respuesta') }}</label>
                            <div class="col-12 col-sm-9 col-lg-9">
                                <input id="detalle[]" type="text"
                                    class="form-control @error('detalle[]') is-invalid @enderror" name="detalle[]"
                                    value="{{ old('detalle[]') }}" required autocomplete="detalle[]" autofocus>
                                    @if ($errors->has('detalle[]'))
                                    <div class="invalid-feedback">{{ $errors->first('detalle[]') }}</div>
                                    @else
                                    <div class="form-text small"></div>
                                @endif --}}
                                {{-- @error('detalle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror --}}
                            {{-- </div>
                        </div>
                        <div class="form-group row">
                            <label for="detalle[]" class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('Respuesta') }}</label>
                            <div class="col-12 col-sm-9 col-lg-9">
                                <input id="detalle[]" type="text"
                                    class="form-control @error('detalle[]') is-invalid @enderror" name="detalle[]"
                                    value="{{ old('detalle[]') }}" required autocomplete="detalle[]" autofocus>
                                    @if ($errors->has('detalle[]'))
                                    <div class="invalid-feedback">{{ $errors->first('detalle[]') }}</div>
                                    @else
                                    <div class="form-text small"></div>
                                @endif --}}
                                {{-- @error('detalle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror --}}
                            {{-- </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
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
</div> --}}
@endsection
