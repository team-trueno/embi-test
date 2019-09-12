@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            @component('components.card')
                @slot('header')
                    Detalle de la consulta
                @endslot

                <div class="card-body">
                    <form action="">
                        <fieldset disabled="disabled">
                        <div class="form-group row">
                            <label for="nombre" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Remitente') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <input type="text" class="form-control" value="{{ $contacto->nombre }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Correo electrónico') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <input type="text" class="form-control" value="{{ $contacto->email }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="asunto" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Asunto') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <input type="text" class="form-control" value="{{ $contacto->asunto }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mensaje" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Mensaje') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <textarea rows="4" class="form-control" >{{ $contacto->mensaje }}</textarea>
                            </div>
                        </div>
                        </fieldset>

                        <div class="form-group row mb-0 float-right">
                            <div class="col">
                                <a class="btn btn-dark" href="{{ route('contactos.index') }}">
                                    {{ __('Atrás') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            @endcomponent
        </div>
    </div>
</div>
@endsection
