@extends('principal')

@section('title','Empleado')

@section('content')
<div class="container">
    <div class = "row-fluid mt-5">
        <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 d-flex justify-content-between align-items-center">
                <h3>Contratos</h3>
                <a href="{{ route('crearContrato') }}" class="btn btn-primary ml-auto">
                    Nuevo contrato
                </a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover text-center">
                        <thead class="table-dark">
                            <th>No.</th>
                            <th>Tipo de contrato</th>
                            <th>Porcentaje de Salario</th>
                            <th>Opciones</th>
                        </thead>
                        @foreach ($contratos as $contrato)
                        <tr>
                            <td>{{ $contrato->id}}</td>
                            <td>{{ $contrato->tipo_contrato}}</td>
                            <td>{{ number_format($contrato->porcentaje_salario_hora, 2)}}</td>
                            <td>
                            <a href="#"><button class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></button></a>
                                <a href="{{ route('verContrato', $contrato->id) }}"><button class="btn btn-info"><i class="fa-regular fa-eye" style="color: white;"></i></button></a>
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