@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            @component('components.card')
                @slot('header')
                    Detalles del nivel
                @endslot
                <div class="card-body">
                    <form action="">
                        <fieldset disabled="disabled">
                        <div class="form-group row">
                            <label for="nombre" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Nombre') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <input type="text" class="form-control" value="{{ $nivel->nombre }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-12 col-sm-3 col-form-label text-sm-right">
                                {{ __('Puntos a superar') }}
                            </label>

                            <div class="col-12 col-sm-9 col-lg-9">
                                <input type="text" class="form-control" value="{{ $nivel->puntos_superar }}">
                            </div>
                        </div>
                        </fieldset>

                        <div class="form-group row mb-0 float-right">
                            <div class="col">
                                {{-- <a class="btn btn-secondary" href="{{ route('niveles.edit', $nivel->id) }}">
                                    {{ __('Editar') }}
                                </a> --}}
                                <a class="btn btn-secondary" href="{{ route('niveles.edit', $nivel->id) }}">
                                    {{ __('Editar') }}
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
