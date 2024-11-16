<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\SalarioController;
use App\Http\Controllers\FichaEmpleadoController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\PuestoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('principal');
})->name('principal');

// Route::get('/empleado', function () {
//     return view('Empleado');
// })->name('empleado');

Route::get('/empleado/crear', [EmpleadoController::class, 'create'])->name('empleado.create');
Route::post('/empleado', [EmpleadoController::class, 'store'])->name('empleado.store');

Route::get('/salario/seleccion', [SalarioController::class, 'create'])->name('guardarPlanilla');
Route::post('/salario/guardando', [SalarioController::class, 'store'])->name('obtenerSalarioDelPeriodo');
Route::get('/salario/solicitud', [SalarioController::class, 'solicitarPlanilla'])->name('solicitudPlanilla');
Route::post('/salario/crear', [SalarioController::class, 'crearPlanilla'])->name('crearSolicitudPlanilla');
Route::post('/salario/enviar', [SalarioController::class, 'guardarPlanilla'])->name('enviarReportePlanilla');

Route::get('/empleado/{id}', [EmpleadoController::class, 'show'])->name('empleado.show');
Route::get('/empleado', [EmpleadoController::class, 'index'])->name('empleado.index');
Route::get('/empleado/{id}/ficha', [FichaEmpleadoController::class, 'edit'])->name('empleado.ficha.edit');
Route::post('/empleado/{empleado_id}/descuento', [FichaEmpleadoController::class, 'store'])->name('empleado_descuento.store');
Route::delete('/empleado-descuento/{id}', [FichaEmpleadoController::class, 'destroy'])->name('empleado_descuento.destroy');

// rutas para editar empleado
Route::get('/empleado/{id}/edit', [EmpleadoController::class, 'edit'])->name('empleado.edit');
Route::put('/empleado/{id}', [EmpleadoController::class, 'update'])->name('empleado.update');

//contrato
Route::get('/contrato/lista', [ContratoController::class, 'index'])->name('listacontratos');
Route::get('/contrato/crear', [ContratoController::class, 'create'])->name('crearContrato');
Route::post('/contrato', [ContratoController::class, 'store'])->name('guardarContrato');
Route::get('/contrato/{contrato}', [ContratoController::class, 'show'])->name('verContrato');
Route::post('/contrato/agregarpago', [ContratoController::class, 'add'])->name('agregarPagoContrato');


//ruta para eliminar empleado
Route::delete('/empleado/{id}', [EmpleadoController::class, 'destroy'])->name('empleado.destroy');

// Rutas de puesto
Route::get('/puestos', [PuestoController::class, 'index'])->name('puesto.index');
Route::get('/puestos/crear', [PuestoController::class, 'create'])->name('puesto.create');
Route::post('/puestos', [PuestoController::class, 'store'])->name('puesto.store');
Route::get('/puestos/{id}/edit', [PuestoController::class, 'edit'])->name('puesto.edit');
Route::put('/puestos/{id}', [PuestoController::class, 'update'])->name('puesto.update');
Route::delete('/puestos/{id}', [PuestoController::class, 'destroy'])->name('puesto.destroy');