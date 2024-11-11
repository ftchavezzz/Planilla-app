<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Pago;
use App\Http\Requests\StoreContratoRequest;
use App\Http\Requests\UpdateContratoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contratos = Contrato::all();
        return view('lista_contratos', compact('contratos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nuevo_contrato');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContratoRequest $request)
    {
        try {
            DB::beginTransaction();

            $validatedData = $request->validated([
                'tipo_contrato' => 'required|string|max:255',
                'porcentaje_salario_hora' => 'required|numeric'
            ]);
            $contrato = new Contrato();
            $contrato->tipo_contrato = $request->tipo_contrato;
            $contrato->porcentaje_salario_hora = $request->porcentaje_salario_hora;
            $contrato->save();

            $pagos = [1, 2, 3]; // IDs de los pagos que se van a asociar en todos los contratos
            $contrato->pagos()->attach($pagos);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('listacontratos')->with('error', 'Error al crear un contrato.');
        }

        return redirect()->route('listacontratos')->with('success', 'Contrato creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contrato $contrato)
    {
        $pagos = $contrato->pagos;
        $pagosDisponibles = Pago::all()->except($pagos->pluck('id')->toArray());
        return view('ver_contrato', compact('contrato', 'pagos', 'pagosDisponibles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contrato $contrato)
    {
        return "Metodo edit";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContratoRequest $request, Contrato $contrato)
    {
        return "Metodo update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contrato $contrato)
    {
        return "Metodo destroy";
    }

    public function add(Request $request)
    {
        try {
            DB::beginTransaction();
            $contrato = Contrato::find($request->contrato_id);
            $contrato->pagos()->attach($request->pago_id);
            DB::commit();
            return redirect()->route('verContrato', ['contrato' => $request->contrato_id])->with('success', 'Beneficio agregado con exito.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('verContrato', ['contrato' => $request->contrato_id])->with('error', 'Error al agregar un beneficio de pago.');
        }
    }
}
