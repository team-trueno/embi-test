@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card card-border-color card-border-color-primary shadow">

                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="float-left">Listado de Tópicos</h4>
                    <a href="{{ route('faq.topicos.create') }}" class="btn btn-warning align-self-center">Añadir Tópico</a>
                </div>

                <div class="card-body">
                <div class="table-responsive">
                    <table id="mytable" class="table table-hover">
                        <thead class="thead-dark">
                            <th>Detalle</th>
                            <th class="text-center t-min">Acciones</th>
                            {{-- <th class="text-center">Ver</th>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Borrar</th> --}}
                        </thead>

                        <tbody>
                                @forelse ($topicos as $topico)
                                <tr>
                                    <td class="align-middle">{{ $topico->detalle }}</td>

                                    <td  class="align-middle d-flex justify-content-between">
                                        {{-- <div class="float-right"> --}}
                                       <a class="btn btn-warning btn-sm" href="{{ route('faq.topicos.show', $topico->id) }}"><i class="fas fa-eye d-lg-none"></i><span class="d-none d-lg-block">Detalle</span></a>


                                        <a class="btn btn-outline-warning btn-sm mr-1 ml-1" href="{{ route('faq.topicos.edit', $topico->id) }}"><i class="fas fa-edit d-lg-none"></i><span class="d-none d-lg-block">Editar</span></a>


                                       <form class="d-inline" action="{{ route('faq.topicos.destroy', $topico->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            {{-- Aca hay que meter un Modal/Alert que pida confirmacion antes de enviar --}}
                                            <button class="btn btn-dark btn-sm" type="submit"><i class="fas fa-trash-alt d-lg-none"></i><span class="d-none d-lg-block">Eliminar</span></button>
                                        </form>
                                    {{-- </div> --}}
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td colspan="12">No hay registros cargados.</td>
                                </tr>
                                @endforelse
                            </tbody>

                        </table>
                        {{ $topicos->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
