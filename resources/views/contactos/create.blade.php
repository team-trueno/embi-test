@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h3 class="float-left">Dejanos tu consulta y te responderemos a la brevedad</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contactos.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nombre Completo') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text"
                                    class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                    value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="asunto"
                                class="col-md-4 col-form-label text-md-right">{{ __('Asunto') }}</label>

                            <div class="col-md-6">
                                <input id="asunto" type="text"
                                    class="form-control @error('asunto') is-invalid @enderror" name="asunto"
                                    value="{{ old('asunto') }}" required autocomplete="asunto" autofocus>

                                @error('asunto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mensaje"
                                class="col-md-4 col-form-label text-md-right">{{ __('Mensaje') }}</label>

                            <div class="col-md-6"  cols="50" rows="1011">
                                <input id="mensaje" type="textarea"
                                    class="form-control @error('mensaje') is-invalid @enderror" name="mensaje"
                                    value="{{ old('mensaje') }}" required autocomplete="mensaje" autofocus>

                                @error('mensaje')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                        {{ __('Enviar mi consulta') }}
                                </button>

                                <a href="/" class="btn btn-dark">Volver a inicio</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection