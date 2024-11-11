@extends('principal')

@section('title','Crear Contrato')

@section('content')
    <div class="container">
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
            
        <div class="container mt-5">
            <div class="row">
                <div class="card card-with-title p-3 mb-4 border-2 border-dark">
                    <span class="card-title">Datos del Contrato</span>
                    <div class="row mb-4">    
                        <div class="col-6 col-md-6 col-lg-6">
                            <label for="nombre" class="form-label">Tipo de contrato</label>
                            <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" readonly value='{{$contrato->tipo_contrato}}' id="tipo_contrato" placeholder="Ingresa el nombre del contrato" name="tipo_contrato" required>
                            @error('nombre')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6 col-md-6 col-lg-6">
                            <label for="dui" class="form-label">Porcentaje Salario</label>
                            <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" readonly value='{{number_format($contrato->porcentaje_salario_hora, 2)}}' id="porcentaje_salario_hora" placeholder="% de salario correspondiente" name="porcentaje_salario_hora" maxlength="9" required>
                            @error('dui')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <form action="{{route('agregarPagoContrato')}}" method="POST">
                        @csrf <!-- Protección contra CSRF -->
                        
                        <div class="container">
                            <div class="row">
                                <input type="text" name="contrato_id" id="contrato_" value='{{$contrato->id}}' hidden>
                                <span class="card-title">Agregar beneficios de pago al contrato</span>
                                <div class="row mb-4">
                                    <div class="col-6 col-md-6 col-lg-6">
                                        <label for="departamento" class="form-label">Pago</label>
                                        <select class="form-select form-select-sm col-md-3 col-lg-2" id="pago_id" placeholder="Seleccione el pago" name="pago_id">
                                            <option value="">--Escoja un pago--</option>
                                            @foreach($pagosDisponibles as $pagoDisponible)
                                                <option value="{{$pagoDisponible['id']}}"> {{$pagoDisponible['nombre']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-4 ">
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                </div>
                            </div>
                        </div>   
                    </form>
                </div>
            </div>
        </div>

        
        

        @if(is_null($pagos) or count($pagos) == 0)
        <p>No hay pagos asociados al contrato</p>
        @else
        <div class="table-container mt-5">
            <div class="table table-bordered">
                
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>N</th>
                            <th>Beneficio</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pagos as $pago)
                        <tr>
                            <td>{{$pago->id}}</td>
                            <td>{{$pago->nombre}}</td>
                            <th></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        @endif
    </div>

@endsection