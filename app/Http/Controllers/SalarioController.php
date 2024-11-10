<?php

namespace App\Http\Controllers;

use App\Models\Salario;
use App\Models\Descuento;
use App\Models\Leydescuento;
use App\Models\Empleado;
use App\Http\Requests\StoreSalarioRequest;
use App\Http\Requests\UpdateSalarioRequest;

class SalarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $descuentos = array_merge(Leydescuento::obtenerNombres(), Descuento::obtenerNombres());
        $empleados = Empleado::all();
        foreach ($empleados as $empleado) {
            //dd($empleado->puesto());
            $empleado->descuentos = $empleado->calcularDescuentos();
        }

        /*$empleado = Empleado::find(1);
        dd($empleado->puesto);*/


        return view('calculoSalario ', compact('descuentos', 'empleados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalarioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Salario $salario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salario $salario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalarioRequest $request, Salario $salario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salario $salario)
    {
        //
    }
}
