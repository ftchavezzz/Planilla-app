@extends('principal')

@section('title','Crear Empleado')

@section('content')

<div class="container">

    <form action="{{ route('enviarReportePlanilla') }}" method="POST">
        @csrf <!-- Protección contra CSRF -->
        
        <div class="container mt-5">
            <div class="row">
                <!-- Primer cuadro -->
                <div class="card card-with-title p-3 mb-4 border-2 border-dark">
                    <!-- Título que interrumpe el borde -->
                    <span class="card-title">Procesar pago de planilla para el empleado</span>
                    <div class="row mb-4">
                        <div class="col-6 col-md-4 col-lg-4">
                            <label for="anio" class="form-label">A&ntilde;o</label>
                            <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" id={{$anio}} name="anio" value={{$anio}} readonly>
                        </div>
                        <div class="col-6 col-md-4 col-lg-4">
                            <label for="mes" class="form-label">Mes</label>
                            <select class="form-select form-select-sm col-md-3 col-lg-2" id="mes" name="mes" required>
                                <option value="{{$mes_id}}" readonly selected>{{$mes}}</option>
                            </select>
                        </div>
                        <div class="col-6 col-md-4 col-lg-4">
                            <label for="quincena" class="form-label">Quincena</label>
                            <select class="form-select form-select-sm col-md-3 col-lg-2" id="quincena" name="quincena" required>
                                <option value="{{$quincena_id}}" readonly selected>{{$quincena}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6 col-md-4 col-lg-4">
                            <label for="empleado_nombre" class="form-label">ID del empleado</label>
                            <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" readonly id="empleado_nombre" value='{{$empleado->nombre}}' name="empleado_nombre" required>
                            <input type="hidden" name="empleado_id" value="{{$empleado->id}}">
                            @error('empleado_nombre')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6 col-md-4 col-lg-4">
                            <label for="departamento" class="form-label">Departamento</label>
                            <select class="form-select form-select-sm col-md-3 col-lg-2" id="departamento" name="departamento" required>
                                <option value="{{$departamento->id}}" readonly selected>{{$departamento->nombre}}</option>
                            </select>
                        </div>
                        <div class="col-6 col-md-4 col-lg-4">
                            <label for="puesto" class="form-label">Puesto</label>
                            <select class="form-select form-select-sm col-md-3 col-lg-2" id="puesto" name="puesto" required>
                                <option value="{{$puesto->id}}" readonly selected>{{$puesto->nombre}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Primer cuadro -->
                <div class="card card-with-title p-3 mb-4 border-2 border-dark">
                    <span class="card-title">Detalle del reporte</span>
                    <div class="row mb-4">
                        <div class="col-6 col-md-4 col-lg-4">
                            <label for="horas" class="form-label">Horas Trabajadas</label>
                            <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" placeholder='Numero de horas' id="horas" name="horas" required>
                            @error('horas')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @foreach($descuentos as $indice => $descuento)
                        <div class="col-6 col-md-4 col-lg-4">
                            <label for="{{$descuento->id}}" class="form-label">{{$descuento->nombre}}</label>
                            <input type="hidden" name="descuentos[{{$indice}}][id]" value="{{$descuento->id}}">
                            <input type="hidden" name="descuentos[{{$indice}}][nombre]" value="{{$descuento->nombre}}">
                            <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" placeholder='$' id="{{$descuento->id}}" name="descuentos[{{$indice}}][valor]">
                            @error('{{$descuento->nombre}}')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @endforeach
                        @foreach($pagos as $indice => $pago)
                        <div class="col-6 col-md-4 col-lg-4">
                            <label for="{{$pago->id}}" class="form-label">{{$pago->nombre}}</label>
                            <input type="hidden" name="pagos[{{$indice}}][id]" value="{{$pago->id}}">
                            <input type="hidden" name="pagos[{{$indice}}][nombre]" value="{{$pago->nombre}}">
                            <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" placeholder='$' id="{{$pago->id}}" name="pagos[{{$indice}}][valor]">
                            @error('{{$pago->nombre}}')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mb-4 ">
                    <button type="submit" class="btn btn-primary">Enviar Planilla</button>
                </div>
            </div>
        </div>   
    </form>
</div>

<script>
    document.getElementById('dui').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); // Elimina cualquier carácter que no sea dígito
        if (value.length > 8) {
            value = value.slice(0, 8) + '-' + value.slice(8, 9); // Inserta el guion antes del último dígito
        }
        e.target.value = value; // Asigna el valor formateado al campo de entrada
    });

    function formatPhoneNumber(input) {
        let value = input.value.replace(/\D/g, ''); // Elimina cualquier carácter que no sea dígito
        if (value.length > 4) {
            value = value.slice(0, 4) + '-' + value.slice(4); // Inserta el guion después de los primeros 4 dígitos
        }
        input.value = value; // Asigna el valor formateado al campo de entrada
    }

    document.getElementById('telefono_fijo').addEventListener('input', function (e) {
        formatPhoneNumber(e.target);
    });

    document.getElementById('telefono_movil').addEventListener('input', function (e) {
        formatPhoneNumber(e.target);
    });
</script>

<style>
    .card-with-title {
        position: relative;
        padding-top: 2rem; /* Espacio adicional para el título */
    }
    .card-title {
        position: absolute;
        top: -1rem;
        left: 1rem;
        background-color: #fff;
        padding: 0 0.5rem;
        font-weight: bold;
    }
</style>

@endsection