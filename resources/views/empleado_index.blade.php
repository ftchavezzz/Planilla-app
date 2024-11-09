@extends('principal')

@section('title','Empleados')

@section('content')
<div class="container">
    <div class = "row-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h3>Listado de Expediente de paciente</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
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
                            <td>{{ $empleado->telefono_mobile}}</td>
                            <td>{{ $empleado->activo}}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection