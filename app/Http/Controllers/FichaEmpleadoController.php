<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Departamento;
use App\Models\Empleado;
use App\Models\Puesto;
use App\Models\EmpleadoContrato;
use App\Models\Descuento;
use App\Models\EmpleadoDescuento;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

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
    public function store(Request $request, $empleado_id)
    {
         // Validar que el campo 'montos' sea un array y que cada valor sea numérico
        // $validated = $request->validate([
        //     'montos' => 'required|array',
        //     'montos.*' => 'numeric|min:0',
        // ]);
        $validated = $request->validate([
            'descuento_id' => 'required|exists:descuentos,id',
            'monto' => 'required|numeric|min:0',
        ]);

        // Recorrer cada descuento y guardar solo aquellos que tienen un monto mayor a cero
        EmpleadoDescuento::create([
            'empleado_id' => $empleado_id,
            'descuento_id' => $validated['descuento_id'],
            'monto' => $validated['monto'],
        ]);
           

        return redirect()->route('empleado.ficha.edit', ['id' => $empleado_id])->with('success', 'Descuentos guardados con éxito.');
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
        $descuentos = EmpleadoDescuento::where('empleado_id', $id)->with('descuento')->get();
        $descuentosDisponibles = Descuento::all();
        // dd($descuentos);
        return view("ficha_empleado", [
            "empleado"=>$empleado,
            "contrato" => $contratoEmpleado, 
            "puesto" => $puesto, 
            "departamento" => $departamento,
            "tipoContrato" => $tipoContrato,
            "descuentos" => $descuentos,
            "descuentosDisponibles" => $descuentosDisponibles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $descuento = EmpleadoDescuento::findOrFail($id);
        $descuento->delete();

        return redirect()->back()->with('show_success_modal', true);
    }

}