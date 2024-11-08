@extends('principal')

@section('title','Crear Empleado')

@section('content')
    <div class="container">
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('empleado.store') }}" method="POST">
            @csrf <!-- Protección contra CSRF -->
            
            <div class="container mt-5">
                <div class="row">
                    <!-- Primer cuadro -->
                    <div class="card card-with-title p-3 mb-4 border-2 border-dark">
                        <!-- Título que interrumpe el borde -->
                        <span class="card-title">Datos del Empleado</span>
                        <div class="row mb-4">    
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" id="nombre" placeholder="Ingresa el nombre del empleado" name="nombre" required>
                                @error('nombre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="dui" class="form-label">Dui</label>
                                <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" id="dui" placeholder="Ingresa el dui del empleado" name="dui" maxlength="9" required>
                                @error('dui')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control form-control-sm col-md-3 col-lg-2" id="fecha_nacimiento" placeholder="Ingresa la fecha de nacimiento del empleado" name="fecha_nacimiento" max="{{ \Carbon\Carbon::now()->subDay()->toDateString() }}" required>
                                @error('fecha_nacimiento')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="telefono_fijo" class="form-label">Telefono Fijo</label>
                                <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" id="telefono_fijo" placeholder="Ingresa el telefono fijo del empleado" name="telefono_fijo" maxlength="9" required>
                                @error('telefono_fijo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="telefono_mobile" class="form-label">Telefono Celular</label>
                                <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" id="telefono_mobile" placeholder="Ingresa el numero celular del empleado" name="telefono_mobile" maxlength="9" required>
                                @error('telefono_mobile')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control form-control-sm col-md-3 col-lg-2" id="email" placeholder="Ingresa el email del empleado" name="email" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> 
                    </div>
                    <div class="card card-with-title p-3 mb-4 mt-5 border-2 border-dark">
                        <!-- Título que interrumpe el borde -->
                        <span class="card-title">Datos del Puesto de Trabajo</span>
                        <div class="row mb-4">
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="departamento" class="form-label">Departamento</label>
                                <select class="form-select form-select-sm col-md-3 col-lg-2" id="departamento" placeholder="Seleccione el departamento" name="departamento" required>
                                    <option value="">--Escoja un departamento--</option>
                                    @foreach($departamentos as $departamento)
                                        <option value="{{$departamento['id']}}"> {{$departamento['nombre']}}
                                        </option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="puesto" class="form-label">Puesto</label>
                                <select class="form-select form-select-sm col-md-3 col-lg-2" id="departamento" placeholder="Seleccione el departamento" name="departamento" required>
                                    <option value="">--Escoja un puesto--</option>
                                    @foreach($puestos as $puesto)
                                        <option value="{{$puesto['id']}}"> {{$puesto['nombre']}}
                                        </option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                                <input type="date" class="form-control form-control-sm col-md-3 col-lg-2" id="fecha_inicio" placeholder="Ingresa la fecha que ingreso el empleado" name="fecha_inicio" required>
                                @error('fecha_ingreso')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                                <input type="date" class="form-control form-control-sm col-md-3 col-lg-2" id="fecha_fin" placeholder="Ingresa la fecha que ingreso el empleado" name="fecha_fin" required>
                                @error('fecha_ingreso')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6 col-md-6 col-lg-6">
                                    <label for="puesto" class="form-label">Tipo de Contrato</label>
                                    <select class="form-select form-select-sm col-md-3 col-lg-2" id="departamento" placeholder="Seleccione el departamento" name="departamento" required>
                                    <option value="">--Escoja un contrato--</option>
                                    @foreach($contratos as $contrato)
                                        <option value="{{$contrato['id']}}"> {{$contrato['tipo_contrato']}}
                                        </option>
                                    @endforeach 
                                </select>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-4 ">
                        <button type="submit" class="btn btn-primary">Crear Empleado</button>
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

        document.getElementById('telefono_mobile').addEventListener('input', function (e) {
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