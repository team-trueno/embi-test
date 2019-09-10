@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row mb-4 justify-content-center">
        <div class="col-12 col-md-8">
            @component('components.card')
            @slot('header')
            Nuevo tópico
            @endslot

            <div class="card-body">
                <form method="POST" action="{{ route('faq.topicos.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="detalle" class="col-12 col-sm-3 col-form-label text-sm-right">
                            {{ __('Tópico') }}
                        </label>

                        <div class="col-12 col-sm-9 col-lg-9">
                            <input id="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror"
                                name="detalle" value="{{ old('detalle') }}" required autocomplete="detalle" autofocus>

                            @if ($errors->has('detalle'))
                            <div class="invalid-feedback">{{ $errors->first('detalle') }}</div>
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

                            <a href="{{ route('faq.topicos.index') }}" class="btn btn-dark">Atrás</a>
                        </div>
                    </div>
                </form>
            </div>
            @endcomponent
        </div>
    </div>
</div>
@endsection
