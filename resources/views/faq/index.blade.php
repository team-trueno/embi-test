@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            @forelse ($topicos as $topico)
                <div class="card">
                    <div class="card-header">
                        <h5>
                            {{ $topico->detalle }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="accordion{{ $topico->id }}">
                            @forelse ($topico->preguntas as $pregunta)
                                <div class="card">
                                    <div class="card-header" id="heading{{ $pregunta->id }}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link text-reset" type="button" data-toggle="collapse" data-target="#collapse{{ $pregunta->id }}" aria-expanded="true" aria-controls="collapse{{ $pregunta->id }}">
                                                {{ $pregunta->detalle }}
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapse{{ $pregunta->id }}" class="collapse" aria-labelledby="heading{{ $pregunta->id }}" data-parent="#accordion{{ $topico->id }}">
                                        <div class="card-body">
                                            <p class="card-text">
                                                {{ $pregunta->respuesta }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            @empty

                            @endforelse

                        </div>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
    </div>
</div>
@endsection
