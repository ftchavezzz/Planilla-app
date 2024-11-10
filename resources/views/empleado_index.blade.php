@extends('principal')

@section('title','Empleados')

@section('content')
<div class="container">
    <div class = "row-fluid mt-5">
        <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 d-flex justify-content-between align-items-center">
                <h3>Listado de empleados</h3>
                <a href="{{ route('empleado.create') }}" class="btn btn-primary ml-auto">
                    Nuevo empleado
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
                            <th>Edad</th>
                            <th>Dui</th>
                            <th>Ingreso</th>
                            <th>Contacto</th>
                            <th>Activo</th>
                            <th>Opciones</th>
                        </thead>
                        @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->id}}</td>
                            <td>{{ $empleado->nombre}}</td>
                            <td>{{ $empleado->fecha_nacimiento}}</td>
                            <td>{{ $empleado->dui}}</td>
                            <td>{{ $empleado->fecha_ingreso}}</td>
                            <td>{{ $empleado->telefono_mobile}} {{ $empleado->telefono_fijo}}</td>
                            <td class="estado" data-estado="{{ $empleado->activo}}">{{ $empleado->activo}}</td>
                            <td>
                                <button class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></button>
                                <a href="{{ route('empleado.show', $empleado->id) }}"><button class="btn btn-info"><i class="fa-regular fa-eye" style="color: white;"></i></button></a>
                                <button class="btn btn-danger"><i class="fa-regular fa-trash-can" ></i></button>
                                <a href="{{ route('empleado.ficha.edit', $empleado->id) }}"><button class="btn btn-primary"><i class="fa-regular fa-address-card" ></i></button></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.estado').forEach(cell => {
      const estado = cell.getAttribute('data-estado');
      
      if (estado === '1') {
        cell.textContent = 'Activo';
        cell.classList.add('activo');
      } else {
        cell.textContent = 'Inactivo';
        cell.classList.add('inactivo');
      }
    });
</script>

<style>
    .activo {
      color: green;
      font-weight: bold;
    }
    .inactivo {
      color: red;
      font-weight: bold;
    }
</style>


@endsection