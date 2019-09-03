<div class="card shadow">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h3 class="float-left">{{ $header }}</h3>
        <a href="{{ route('preguntas.index') }}" class="btn btn-primary align-self-center">Inicio</a>
    </div>
    {{$slot}}
</div>
