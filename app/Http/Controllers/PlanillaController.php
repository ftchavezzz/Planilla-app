<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salario;
use App\Models\Leydescuento;
use App\Models\Descuento;
use App\Models\Pago;/*
use App\Models\Salario;
use App\Models\Salario;
use App\Models\Salario;*/

class PlanillaController extends Controller
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
        return view('record_planilla');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $anio = $request->anio;
        $mes_id = $request->mes;
        $quincena_id = $request->quincena;
        $meses = ["", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agostyo", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        $mes = $meses[$mes_id];
        $quincena = $quincena_id==1? "1ra Quincena": "2da Quincena";
        $nombres_descuentos = array_merge(Leydescuento::obtenerNombres(), Descuento::obtenerNombres());
        $nombres_pagos = Pago::obtenerNombres();
        $salarios = Salario::where('anio', $anio)->where('mes', $mes_id)->where('quincena', $quincena_id)->where('procesado', 1)->get();
        //dd($salarios);
        $empleados = [];
        foreach ($salarios as $salario) {
            $empleado = $salario->empleado;
            $empleados[] = $empleado;
            $descuentos = [];
            $salario->pago_bruto = $empleado->obtenerSalarioBrutoQuincenal($salario->id);
            $totalDescuentos = 0;
            
            //Calculo de descuentos
            $descuentosLey = Leydescuento::obtenerDescuentosLeyQuincenales($salario->pago_bruto);
            foreach ($descuentosLey as $descuentoLey) {
                $descuentos[] = $descuentoLey;
                $totalDescuentos += $descuentoLey;
            }
            $descuentosOpcionales = Descuento::ObtenerDescuentosQuincenales($salario->id);
            foreach ($descuentosOpcionales as $descuentoOpcional) {
                $descuentos[] = $descuentoOpcional;
                $totalDescuentos += $descuentoOpcional;
            }
            
            //Agregando informacion al empleado
            $empleado->descuentos = $descuentos;
            $empleado->pagos = Pago::obtenerPagosQuincenales($salario->id);

            $salarioNoDeducible = Pago::obtenerMontoPagosQuincenalesNoDeducible($salario->id);
            $salario->pago_realizado = $salario->pago_bruto - $totalDescuentos + $salarioNoDeducible;
            $empleado->salario = $salario;
            
        }

        //dd(count($salarios));
        return view('
                salarioProcesado',
                compact('anio', 'mes', 'mes_id', 'quincena', 'quincena_id', 'salarios', 'nombres_descuentos', 'nombres_pagos', 'empleados')
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
