<div class="card card-border-color card-border-color-primary shadow">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="float-left">{{ $header }}</h5>
        <a href="{{ route('preguntas.index') }}" class="btn btn-primary align-self-center">Inicio</a>
    </div>
    {{$slot}}
</div>
