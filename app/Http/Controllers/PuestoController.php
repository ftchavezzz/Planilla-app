<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use App\Models\Departamento;
use App\Http\Requests\StorePuestoRequest;
use App\Http\Requests\UpdatePuestoRequest;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puestos = Puesto::all();
        return view('puesto_index', ["puestos"=>$puestos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departamento::all();
        return view('puesto_crear', ["departamentos"=>$departamentos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            // Validación de datos
            $validatedData = $request->validate([
                'departamento_id' => 'required|integer',
                'nombre' => 'required|string|max:255',
                'salario_hora' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
                'salario_mensual' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
                'descripcion' => 'required|string|max:255',
            ]);

            // Guardar el empleado 
            $puesto = Puesto::create($validatedData);
        
        } catch (\Exception $e) {
            dd($e->getMessage());  // Muestra el error si ocurre
        }
        return redirect()->route('puesto.index')->with('success', 'Puesto creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Puesto $puesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $puesto = Puesto::findOrFail($id);
        $departa = Departamento::where('id', $puesto->departamento_id)->first();
        $departamentos = Departamento::all();
        return view("puesto_edit", ["puesto" => $puesto, "depart" => $departa, "departamentos" => $departamentos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validación de datos
            $validatedData = $request->validate([
                'departamento_id' => 'required|integer',
                'nombre' => 'required|string|max:255',
                'salario_hora' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
                'salario_mensual' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
                'descripcion' => 'required|string|max:255',
            ]);

            $puesto = Puesto::findOrFail($id);
            $puesto->update($validatedData);
        } catch (\Exception $e) {
            dd($e->getMessage());  // Muestra el error si ocurre
        }
        return redirect()->route('puesto.index')->with('success', 'Puesto actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $puesto = Puesto::findOrFail($id);
        if ($puesto) {
            $puesto->delete(); // Elimina el registro
            return redirect()->route('puesto.index')->with('success', 'Puesto eliminado exitosamente.');
        } else {
            return redirect()->route('puesto.index')->with('error', 'Puesto no encontrado.');
        }
    }
}
