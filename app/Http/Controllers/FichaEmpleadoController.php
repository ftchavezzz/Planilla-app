<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Departamento;
use App\Models\Empleado;
use App\Models\Puesto;
use App\Models\EmpleadoContrato;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class FichaEmpleadoController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmpleadoRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        $contratoEmpleado = EmpleadoContrato::where('empleado_id', $id)->first();
        $puesto = Puesto::where('id', $empleado->puesto_id)->first();
        $departamento = Departamento::where('id', $puesto->departamento_id)->first();
        $tipoContrato = Contrato::where('id', $contratoEmpleado->contrato_id)->first();
        
        return view("ficha_empleado", [
            "empleado"=>$empleado,
            "contrato" => $contratoEmpleado, 
            "puesto" => $puesto, 
            "departamento" => $departamento,
            "tipoContrato" => $tipoContrato
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmpleadoRequest $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        //
    }

}