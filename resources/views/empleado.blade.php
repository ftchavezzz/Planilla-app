@extends('principal')

@section('title','Crear Empleado')

@section('content')
    <div class="container">
        <h1>Registro Empleado</h1>
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('empleado.store') }}" method="POST">
            @csrf <!-- Protección contra CSRF -->
            
            <div class="row mb-4 mt-5">
                <div class="col-6 col-md-6 col-lg-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" id="nombre" placeholder="Ingresa el nombre del empleado" name="nombre" required>
                    @error('nombre')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6 col-md-6 col-lg-6">
                    <label for="dui" class="form-label">Dui</label>
                    <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" id="dui" placeholder="Ingresa el dui del empleado" name="dui" maxlength="9" required>
                    @error('dui')
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
                    <label for="telefono_movil" class="form-label">Telefono Celular</label>
                    <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" id="telefono_movil" placeholder="Ingresa el numero celular del empleado" name="telefono_movil" maxlength="9" required>
                    @error('telefono_movil')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-6 col-md-6 col-lg-6">
                    <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
                    <input type="date" class="form-control form-control-sm col-md-3 col-lg-2" id="fecha_ingreso" placeholder="Ingresa la fecha que ingreso el empleado" name="fecha_ingreso" max="{{ \Carbon\Carbon::now()->today()->toDateString() }}" required>
                    @error('fecha_ingreso')
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

            <div class="row mb-5">
                <div class="col-6 col-md-6 col-lg-6">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control form-control-sm col-md-3 col-lg-2" id="email" placeholder="Ingresa el email del empleado" name="email" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6 col-md-6 col-lg-6">
                    <label for="activo" class="form-label">Activo</label>
                    <select class="form-select form-select-sm col-md-3 col-lg-2" id="activo" name="activo" required>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary">Crear Empleado</button>
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
@endsection