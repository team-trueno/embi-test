<div class="card card-border-color card-border-color-primary shadow">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="float-left mb-0">{{ $header }}</h5>
        {{ $boton ?? '' }}
    </div>
    {{ $slot }}
</div>
