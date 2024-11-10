<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\SalarioController;

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