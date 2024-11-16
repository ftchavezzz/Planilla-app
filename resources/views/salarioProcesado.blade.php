@extends('principal')

@section('title','Crear Empleado')

@section('content')

    <div class="container">
        <h1>Planilla procesada</h1>
        
        <form action="{{ route('obtenerSalarioDelPeriodo') }}" method="POST">
            @csrf <!-- Protección contra CSRF -->

            <div class="selectors">
                <div class="row">
                    <!-- Primer cuadro -->
                    <div class="card card-with-title p-3 mb-4 border-2 border-dark">
                        <div class="row mb-4">
                            <div>
                                <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" id="id" name="id" value='1' hidden required>
                            </div>
                            <div class="col-6 col-md-4 col-lg-4">
                                <label for="anio" class="form-label">A&ntilde;o</label>
                                <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" id={{$anio}} name="anio" value={{$anio}} readonly>
                            </div>
                            <div class="col-6 col-md-4 col-lg-4">
                                <label for="anio" class="form-label">Mes</label>
                                <select class="form-select form-select-sm col-md-3 col-lg-2" id="mes" name="mes" required>
                                    <option value="{{$mes_id}}" readonly selected>{{$mes}}</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-4 col-lg-4">
                                <label for="anio" class="form-label">Quincena</label>
                                <select class="form-select form-select-sm col-md-3 col-lg-2" id="quincena" name="quincena" required>
                                    <option value="{{$quincena_id}}" readonly selected>{{$quincena}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-container mt-5">
                <div style="overflow-x: auto; max-height: 300px; width: 100%;">
                    
                    <table class="table table-bordered" style="text-align: center; border-collapse: separate; border-spacing: 0 10px;">
                        <thead class="table-dark">
                            <tr>
                                <th>N</th>
                                <th>Nombre</th>
                                <th>Horas trabajadas</th>
                                <th>salario Ordinario</th>
                                @foreach($nombres_pagos as $pago)
                                    <th>{{$pago}}</th>
                                @endforeach
                                <th>Salario Bruto</th>
                                @foreach($nombres_descuentos as $descuento)
                                    <th>{{$descuento}}</th>
                                @endforeach
                                <th>Total a pagar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            </tr>
                            @foreach($empleados as $empleado)
                            <tr>
                                <td>{{$empleado->id}}</td>
                                <td>{{$empleado->nombre}}</td>
                                <td>{{$empleado->salario->horas_trabajadas}}</td>
                                <th>$ {{number_format(($empleado->salario->salario_ordinario), 2, '.', ',')}}</th>
                                @foreach($empleado->pagos as $pago)
                                    <th>$ {{number_format($pago, 2, '.', ',')}}</th>
                                @endforeach
                                <th>$ {{number_format(($empleado->salario->pago_bruto), 2, '.', ',')}}</th>
                                @foreach($empleado->descuentos as $descuento)
                                    <th>$ {{number_format($descuento, 2, '.', ',')}}</th>
                                @endforeach
                                <th>$ {{number_format(($empleado->salario->pago_realizado), 2, '.', ',')}}</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </form>
    </div>

@endsection