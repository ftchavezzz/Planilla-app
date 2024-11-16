@extends('principal')

@section('title','Crear Puesto')

@section('content')
<div class="container">
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('puesto.store') }}" method="POST">
            @csrf <!-- Protección contra CSRF -->
            
            <div class="container mt-5">
                <div class="row">
                    <!-- Primer cuadro -->
                    <div class="card card-with-title p-3 mb-4 border-2 border-dark">
                        <!-- Título que interrumpe el borde -->
                        <span class="card-title">Datos del Puesto</span>
                        <div class="row mb-4">    
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" id="nombre" placeholder="Ingresa el nombre del puesto" name="nombre" required>
                                @error('nombre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="departamento" class="form-label">Departamento</label>
                                <select class="form-select form-select-sm col-md-3 col-lg-2" id="departamento" placeholder="Seleccione el departamento" name="departamento_id">
                                    <option value="">--Escoja un departamento--</option>
                                    @foreach($departamentos as $departamento)
                                        <option value="{{$departamento['id']}}"> {{$departamento['nombre']}}
                                        </option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="salario_mensual" class="form-label">Salario Mensual</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="text" id="salario_mensual" name="salario_mensual" class="form-control form-control-sm col-md-3 col-lg-2" id="salario_mensual" oninput="formatearSalario(this)" placeholder="0.00" required>
                                </div>
                                @error('salario_mensual')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="salario_hora" class="form-label">Salario por Hora</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="text" id="salario_hora" name="salario_hora" class="form-control form-control-sm col-md-3 col-lg-2" id="salario_hora" oninput="formatearSalario(this)" placeholder="0.00" required>
                                </div>
                                @error('salario_hora')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea  class="form-control form-control-sm col-md-3 col-lg-2" id="descripcion" placeholder="Ingresa la descripción del puesto" name="descripcion" rows="3"></textarea>
                                @error('descripcion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-4 ">
                        <button type="submit" class="btn btn-primary">Crear Puesto</button>
                    </div>
                </div>
            </div>   
        </form>
    </div>

    <script>
        function formatearSalario(input) {
            let valor = input.value;

            let valor = input.value;

            // Eliminar cualquier caracter no numérico (excepto el punto decimal)
            valor = valor.replace(/[^0-9.]/g, '');

            // Asegurarse de que solo haya un punto decimal
            const partes = valor.split('.');
            if (partes.length > 2) {
                valor = partes[0] + '.' + partes.slice(1).join('');
            }

            // Dar formato con el separador de miles
            valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, ',');

            // Cambiar el valor del campo que invoca la función
            input.value = valor;

            let idInput = input.id; 
            document.getElementById(idInput).value = valor;
        }
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