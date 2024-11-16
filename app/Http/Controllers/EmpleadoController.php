<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;
use App\Models\Puesto;
use App\Models\Contrato;
use App\Models\EmpleadoContrato;
use App\Http\Requests\StoreEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleado_index', ["empleados"=>$empleados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departamento::all();
        $puestos = Puesto::all();
        $contratos = Contrato::all();
        return view('empleado_crear', ["departamentos"=>$departamentos ,"puestos"=>$puestos,"contratos"=>$contratos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmpleadoRequest $request)
    {
        try {

            // Validación de datos
            $validatedData = $request->validate([
                'puesto_id' => 'required|integer',
                'nombre' => 'required|string|max:255',
                'dui' => 'required|string|max:255',
                'telefono_fijo' => 'required|string|max:255',
                'telefono_movil' => 'required|string|max:255',
                'fecha_ingreso' => 'required|date',
                'fecha_nacimiento' => 'required|date',
                'email' => 'email|max:255',
                'activo' => 'boolean',
                // 'posicion' => 'required|string|max:255',
            ]);

            // Guardar el empleado 
            $empleado = Empleado::create($validatedData);
        
            $validatedDataEC = $request->validate([ 
                'contrato_id' => 'required|integer',
                'fecha_ingreso' => 'required|date',
                'fecha_fin' => 'required|date',
                'vigente' => 'boolean',
            ]);

            //Asignando el id empleado al contrato_empleado
            $validatedDataEC['empleado_id'] = $empleado->id;
            $validatedDataEC['fecha_inicio'] = $validatedDataEC['fecha_ingreso'];

            $empleado_contrato = EmpleadoContrato::create($validatedDataEC);
        } catch (\Exception $e) {
            dd($e->getMessage());  // Muestra el error si ocurre
        }
        return redirect()->route('empleado.index')->with('success', 'Empleado creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);
        $contratoEmpleado = EmpleadoContrato::where('empleado_id', $id)->first();
        $puesto = Puesto::where('id', $empleado->puesto_id)->first();
        $departamento = Departamento::where('id', $puesto->departamento_id)->first();
        $tipoContrato = Contrato::where('id', $contratoEmpleado->contrato_id)->first();
        return view("empleado_show", [
            "empleado"=>$empleado,
            "contrato" => $contratoEmpleado, 
            "puesto" => $puesto, 
            "departamento" => $departamento,
            "tipoContrato" => $tipoContrato
        ]);
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

        $departamentos = Departamento::all();
        $puestos = Puesto::all();
        $tipoContrato = Contrato::all();
        return view("empleado_edit", ["empleado"=>$empleado, "contrato" => $contratoEmpleado, "puestos" => $puestos, 
            "departamentos" => $departamentos,
            "tipoContratos" => $tipoContrato,
            "depart" => $departamento]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validación de datos
            $validatedData = $request->validate([
                'puesto_id' => 'required|integer',
                'nombre' => 'required|string|max:255',
                'dui' => 'required|string|max:255',
                'telefono_fijo' => 'required|string|max:255',
                'telefono_movil' => 'required|string|max:255',
                // 'fecha_ingreso' => 'required|date',
                'fecha_nacimiento' => 'required|date',
                'email' => 'email|max:255',
                'activo' => 'boolean',
                // 'posicion' => 'required|string|max:255',
            ]);

            // Guardar el empleado 
            $empleado = Empleado::findOrFail($id);

            $empleado->update($validatedData);
        
            $validatedDataEC = $request->validate([ 
                'contrato_id' => 'required|integer',
                'fecha_inicio' => 'required|date',
                'fecha_fin' => 'required|date',
                'vigente' => 'boolean',
            ]);

            //Asignando el id empleado al contrato_empleado
            $validatedDataEC['empleado_id'] = $empleado->id;

            $contratoEmpleado = EmpleadoContrato::where('empleado_id', $id)->first();
            $contratoEmpleado->update($validatedDataEC);

        
        } catch (\Exception $e) {
            dd($e->getMessage());  // Muestra el error si ocurre
        }
        return redirect()->route('empleado.index')->with('success', 'Empleado creado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $empleado = Empleado::findOrFail($id);
        if ($empleado) {
            $empleado->delete(); // Elimina el registro
            return redirect()->route('empleado.index')->with('success', 'Empleado eliminado exitosamente.');
        } else {
            return redirect()->route('empleado.index')->with('error', 'Empleado no encontrado.');
        }
    }
}
