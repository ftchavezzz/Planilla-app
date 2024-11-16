<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\SalarioController;
use App\Http\Controllers\FichaEmpleadoController;
use App\Http\Controllers\ContratoController;

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

Route::get('/salario', [SalarioController::class, 'create'])->name('salario.create');

Route::get('/empleado/{id}', [EmpleadoController::class, 'show'])->name('empleado.show');
Route::get('/empleado', [EmpleadoController::class, 'index'])->name('empleado.index');
Route::get('/empleado/{id}/ficha', [FichaEmpleadoController::class, 'edit'])->name('empleado.ficha.edit');
Route::post('/empleado/{empleado_id}/descuento', [FichaEmpleadoController::class, 'store'])->name('empleado_descuento.store');

// rutas para editar empleado
Route::get('/empleado/{id}/edit', [EmpleadoController::class, 'edit'])->name('empleado.edit');
Route::put('/empleado/{id}', [EmpleadoController::class, 'update'])->name('empleado.update');

//contrato
Route::get('/contrato/lista', [ContratoController::class, 'index'])->name('listacontratos');
Route::get('/contrato/crear', [ContratoController::class, 'create'])->name('crearContrato');
Route::post('/contrato', [ContratoController::class, 'store'])->name('guardarContrato');
Route::get('/contrato/{contrato}', [ContratoController::class, 'show'])->name('francisco.ticas');
Route::post('/contrato/agregarpago', [ContratoController::class, 'add'])->name('agregarPagoContrato');


//ruta para eliminar empleado
Route::delete('/empleado/{id}', [EmpleadoController::class, 'destroy'])->name('empleado.destroy');