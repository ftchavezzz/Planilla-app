@extends('principal')

@section('title','Ficha Empleado')

@section('content')

    <div class="container">
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

            <div class="container mt-5">
                <div class="row">
                    <!-- Primer cuadro -->
                    <div class="card card-with-title p-3 mb-4 border-2 border-dark">
                        <!-- Título que interrumpe el borde -->
                        <span class="card-title">Datos del Empleado</span>
                        <div class="row mb-4">    
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" value="{{$empleado->nombre}}" class="form-control form-control-sm col-md-3 col-lg-2" id="nombre"  name="nombre" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="dui" class="form-label">Dui</label>
                                <input type="text" value="{{$empleado->dui}}" class="form-control form-control-sm col-md-3 col-lg-2" id="dui" name="dui" maxlength="9" required>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" value="{{$empleado->fecha_nacimiento}}" class="form-control form-control-sm col-md-3 col-lg-2" id="fecha_nacimiento" name="fecha_nacimiento" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="telefono_fijo" class="form-label">Telefono Fijo</label>
                                <input type="text" value="{{$empleado->telefono_fijo}}" class="form-control form-control-sm col-md-3 col-lg-2" id="telefono_fijo" name="telefono_fijo" maxlength="9" required>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="telefono_mobile" class="form-label">Telefono Celular</label>
                                <input type="text" value="{{$empleado->telefono_mobile}}" class="form-control form-control-sm col-md-3 col-lg-2" id="telefono_mobile" name="telefono_mobile" maxlength="9" required>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" value="{{$empleado->email}}" class="form-control form-control-sm col-md-3 col-lg-2" id="email" name="email" required>
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
                                    <option value="{{ $departamento->nombre }}" selected disabled>{{$departamento->nombre}}</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="puesto" class="form-label">Puesto</label>
                                <select class="form-select form-select-sm col-md-3 col-lg-2" id="departamento" placeholder="Seleccione el departamento" name="departamento" required>
                                    <option value="{{ $puesto->nombre }}" selected disabled>{{$puesto->nombre}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                                <input type="date" value="{{$contrato->fecha_inicio}}" class="form-control form-control-sm col-md-3 col-lg-2" id="fecha_inicio" placeholder="Ingresa la fecha que ingreso el empleado" name="fecha_inicio" required>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                                <input type="date" value="{{$contrato->fecha_fin}}" class="form-control form-control-sm col-md-3 col-lg-2" id="fecha_fin" placeholder="Ingresa la fecha que finalizo el empleado" name="fecha_fin" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="tipoContrato" class="form-label">Tipo de Contrato</label>
                                <select class="form-select form-select-sm col-md-3 col-lg-2" id="tipoContrato" placeholder="Seleccione el tipoContrato" name="tipoContrato" required>
                                <option value="{{$tipoContrato->tipo_contrato}}" selected disabled>{{$tipoContrato->tipo_contrato}}</option>
                                </select>
                            </div>
                        </div>
                    </div> 
                    <form action="{{ route('empleado_descuento.store', ['empleado_id' => $empleado->id]) }}" method="POST">
                        @csrf
                        <div class="card card-with-title p-3 mb-4 mt-5 border-2 border-dark">
                            <!-- Título que interrumpe el borde -->
                            <span class="card-title">Descuentos</span>
                            <div class="col-lg-16 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-condensed table-hover text-left">
                                        <thead class="table-dark">
                                            <th>Nombre del Descuento</th>
                                            <th>Monto</th>
                                        </thead>
                                        @foreach ($descuentos as $descuento)
                                        <tr>
                                            <td>{{ $descuento->nombre}}</td>
                                            <td>
                                                <input type="number" name="montos[{{ $descuento->id }}]" class="form-control" step="0.01" min="0" value="0">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-2 ">
                                    <button type="submit" class="btn btn-primary">Agregar Descuento</button>
                                </div>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
    </div>


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