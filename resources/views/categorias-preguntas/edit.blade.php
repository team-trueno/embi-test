@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                <h3>Actualizar datos de la categoría "{{$categoriasPreguntas->categoria}}"</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('categorias-preguntas.update',$categoriasPreguntas->id) }}" role="form">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">

                        <div class="form-group row">
                            <label for="categoria"
                                class="col-md-4 col-form-label text-md-right">{{ __('Categoría') }}</label>

                            <div class="col-md-6">
                                <input id="categoria" type="text"
                                    class="form-control @error('categoria') is-invalid @enderror" name="categoria"
                                    value="{{$categoriasPreguntas->categoria}}" required autocomplete="categoria" autofocus>

                                @error('categoria')
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

                                <a href="{{ route('categorias-preguntas.index') }}" class="btn btn-dark">Atrás</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection