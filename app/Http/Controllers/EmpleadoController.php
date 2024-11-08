<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleado');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmpleadoRequest $request)
    {
        // $request->validate([
        //     'fecha_nacimiento' => 'required|date|before:today',
        // ]);

        // Validación de datos
        $validatedData = $request->validate([
            'puesto_id' => 'required|integer',
            'nombre' => 'required|string|max:255',
            'dui' => 'required|string|max:255',
            'telefono_fijo' => 'required|string|max:255',
            'telefono_mobile' => 'required|string|max:255',
            'fecha_ingreso' => 'required|date',
            'fecha_nacimiento' => 'required|date',
            'email' => 'required|email|max:255',
            'activo' => 'boolean'
            // 'posicion' => 'required|string|max:255',
        ]);

        // Guardar el empleado (lógica de almacenamiento aquí)
        $empleado = Empleado::create($validatedData);

        return redirect()->route('empleado.create')->with('success', 'Empleado creado con éxito.');
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
    public function edit(Empleado $empleado)
    {
        //
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
