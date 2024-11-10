@extends('principal')

@section('title','Crear Empleado')

@section('content')

    <div class="container">
        <h1>Cálculo de Salario</h1>
        
        <div class="selectors">
            <label>Seleccione el Departamento
                <select>
                    <option>Departamento de Marketing</option>
                    <!-- Agregar más opciones según sea necesario -->
                </select>
            </label>

            <label>Seleccione el Puesto
                <select>
                    <option>Diseñador Gráfico</option>
                    <!-- Agregar más opciones según sea necesario -->
                </select>
            </label>

            <label>Fecha de inicio:
                <input type="date">
            </label>

            <label>Fecha de corte:
                <input type="date">
            </label>
        </div>

        <div class="table-container mt-5">
            <div class="table table-bordered">
                
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>N</th>
                            <th>Nombre</th>
                            <th>Salario Bruto</th>
                            @foreach($descuentos as $descuento)
                                <th>{{$descuento}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        </tr>
                        @foreach($empleados as $empleado)
                        <tr>
                            <td>{{$empleado->id}}</td>
                            <td>{{$empleado->nombre}}</td>
                            <th>$ {{number_format(($empleado->obtenerSalarioBruto() / 2), 2, '.', ',')}}</th>
                            @foreach($empleado->descuentos as $descuento)
                                <th>$ {{number_format($descuento, 2, '.', ',')}}</th>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <button class="guardar-planilla">Guardar Planilla</button>
    </div>

@endsection