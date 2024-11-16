@extends('principal')

@section('title','Crear Empleado')

@section('content')

<div class="container">

    <form action="{{ route('crearSolicitudPlanilla') }}" method="POST">
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
                            <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" id="anio" placeholder="Ingresa el a&ntilde;o" name="anio" maxlength="4" required>
                            @error('anio')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6 col-md-4 col-lg-4">
                            <label for="mes" class="form-label">Mes</label>
                            <select class="form-select form-select-sm col-md-3 col-lg-2" id="mes" name="mes" required>
                                <option value="" disabled selected>Seleccione un mes</option>
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>
                        <div class="col-6 col-md-4 col-lg-4">
                            <label for="quincena" class="form-label">Quincena</label>
                            <select class="form-select form-select-sm col-md-3 col-lg-2" id="quincena" name="quincena" required>
                                <option value="" disabled selected>Seleccione una quincena</option>
                                <option value="1">1ra Quincena</option>
                                <option value="2">2da Quincena</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6 col-md-4 col-lg-4">
                            <label for="anio" class="form-label">ID del empleado</label>
                            <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" id="empleado_id" placeholder="Ingresa el numero de id" name="empleado_id" required>
                            @error('empleado_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mb-4 ">
                    <button type="submit" class="btn btn-primary">Buscar Empleado</button>
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