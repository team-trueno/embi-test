<div class="card card-border-color card-border-color-primary shadow">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="float-left mb-0">{{ $header }}</h5>
        <a href="{{ route('index') }}" class="btn btn-primary align-self-center disabled">Inicio</a>
    </div>
    {{ $slot }}
</div>
