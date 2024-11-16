@extends('principal')

@section('title','Puestos')

@section('content')
<div class="container">
    <div class = "row-fluid mt-5">
        <div class="row">
        <div class="col-lg-11 col-md-8 col-sm-8 col-xs-12 d-flex justify-content-between align-items-center">
                <h3>Listado de puestos</h3>
                <a href="{{ route('puesto.create') }}" class="btn btn-primary ml-auto">
                    Nuevo Puesto
                </a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover text-center">
                        <thead class="table-dark">
                            <th>No.</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Opciones</th>
                        </thead>
                        @foreach ($puestos as $puesto)
                        <tr>
                            <td>{{ $puesto->id}}</td>
                            <td>{{ $puesto->nombre}}</td>
                            <td>{{ $puesto->descripcion}}</td>
                            <td>
                                <a href="{{ route('puesto.edit', $puesto->id) }}"><button class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></button></a>
                                <button type="submit" 
                                class="btn btn-danger"
                                data-action="{{ route('puesto.destroy', $puesto->id) }}"
                                onclick="confirmDeletePuesto(this)"><i class="fa-regular fa-trash-can"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal de Confirmación -->
<div class="modal fade" id="confirmDeleteModalPuesto" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de eliminar este puesto? Esta acción no se puede deshacer.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <!-- El botón de eliminar que se activa dinámicamente -->
                <form id="deleteForm" action="" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
        function confirmDeletePuesto(button) {
            const actionUrl = button.getAttribute('data-action'); // Obtén la URL desde el atributo data-action
            const deleteForm = document.getElementById('deleteForm'); // Encuentra el formulario
            deleteForm.action = actionUrl; // Asigna la URL al formulario

            // Muestra el modal
            const deleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModalPuesto'));
            deleteModal.show();
        }
    </script>
@endsection