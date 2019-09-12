@extends('layouts.master')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card card-border-color card-border-color-primary shadow">

                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="float-left">Ranking de jugadores</h4>
                        {{-- <a href="{{ route('preguntas.create') }}" class="btn btn-warning align-self-center">Añadir Usuario</a> --}}
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="mytable" class="table table-hover">
                                <thead class="thead-dark">
                                    <th>Avatar</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Nivel</th>
                                    <th>Puntos</th>
                                </thead>

                                <tbody>
                                    @forelse ($jugadores as $jugador)
                                    <tr>
                                        <td class="align-middle">
                                            <img src="{{ asset('storage/img/avatars/'.$jugador->user->avatar) }}" alt="">
                                        </td>
                                        <td class="align-middle">{{ $jugador->user->name }}</td>
                                        <td class="align-middle">{{ $jugador->user->apellido }}</td>
                                        <td class="align-middle d-none d-md-table-cell">{{ $jugador->nivel->nombre }}</td>
                                        <td class="align-middle d-none d-md-table-cell">{{ $jugador->puntos }}</td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12">No hay registros cargados.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                {{ $jugadores->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endsection
