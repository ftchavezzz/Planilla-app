@extends('principal')

@section('title','Crear Contrato')

@section('content')
    <div class="container">
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action=" {{ route('guardarContrato') }}" method="POST">
            @csrf <!-- Protección contra CSRF -->
            
            <div class="container mt-5">
                <div class="row">
                    <div class="card card-with-title p-3 mb-4 border-2 border-dark">
                        <span class="card-title">Datos del Contrato</span>
                        <div class="row mb-4">    
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="nombre" class="form-label">Tipo de contrato</label>
                                <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" id="tipo_contrato" placeholder="Ingresa el nombre del contrato" name="tipo_contrato" required>
                                @error('nombre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="dui" class="form-label">Porcentaje Salario</label>
                                <input type="text" class="form-control form-control-sm col-md-3 col-lg-2" id="porcentaje_salario_hora" placeholder="% de salario correspondiente" name="porcentaje_salario_hora" maxlength="9" required>
                                @error('dui')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-4 ">
                        <button type="submit" class="btn btn-primary">Crear Contrato</button>
                    </div>
                </div>
            </div>   
        </form>
    </div>

@endsection