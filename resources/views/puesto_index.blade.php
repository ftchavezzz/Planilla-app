@extends('principal')

@section('title','Puestos')

@section('content')
<div class="container">
    <div class = "row-fluid mt-5">
        <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 d-flex justify-content-between align-items-center">
                <h3>Listado de puestos</h3>
                <a href="{{ route('puesto.create') }}" class="btn btn-primary ml-auto">
                    Nuevo Puesto
                </a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover text-center">
                        <thead class="table-dark">
                            <th>No.</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Opciones</th>
                        </thead>
                        @foreach ($puestos as $puesto)
                        <tr>
                            <td>{{ $puesto->id}}</td>
                            <td>{{ $puesto->nombre}}</td>
                            <td>{{ $puesto->descripcion}}</td>
                            <td>
                                <a href="{{ route('puesto.edit', $puesto->id) }}"><button class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></button></a>
                                <form action="{{ route('puesto.destroy', $puesto->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar el puesto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection