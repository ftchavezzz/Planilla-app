<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salario;
use App\Models\Descuento;
use App\Models\Leydescuento;
use App\Models\Empleado;
use App\Models\Pago;
use App\Http\Requests\StoreSalarioRequest;
use App\Http\Requests\UpdateSalarioRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        return view('seleccion_periodo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalarioRequest $request)
    {
        $anio = $request->anio;
        $mes_id = $request->mes;
        $quincena_id = $request->quincena;
        $meses = ["", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agostyo", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        $mes = $meses[$mes_id];
        $quincena = $quincena_id==1? "1ra Quincena": "2da Quincena";
        //Validacion del periodo seleccionado
        $nombres_descuentos = array_merge(Leydescuento::obtenerNombres(), Descuento::obtenerNombres());
        $nombres_pagos = Pago::obtenerNombres();
        $salarios = Salario::where('anio', $anio)->where('mes', $mes_id)->where('quincena', $quincena_id)->get();
        

        DB::beginTransaction();

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

            if ($request->id == 0) {
                $salario->save();
            }
            else {
                $salario->procesado = true;
                $salario->save();
            }
            
        }
        //dd($salarios);
        DB::commit();
        if ($request->id == 0) {
            return view(
                'calculoSalario ',
                compact('anio', 'mes', 'mes_id', 'quincena', 'quincena_id', 'salarios', 'nombres_descuentos', 'nombres_pagos', 'empleados')
            );
        }
        else {
            return view('
                salarioProcesado',
                compact('anio', 'mes', 'mes_id', 'quincena', 'quincena_id', 'salarios', 'nombres_descuentos', 'nombres_pagos', 'empleados')
            );
        }

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

    /**
     * 
     */
    public function solicitarPlanilla() {
        return view('planilla_empleado_solicitud');
    }

    /**
     * 
     */
    public function crearPlanilla(Request $request) {
        try {
            $meses = ["", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agostyo", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
            $anio = $request->anio;
            $mes_id = $request->mes;
            $quincena_id = $request->quincena;
            $mes = $meses[$mes_id];
            $quincena = $quincena_id==1? "1ra Quincena": "2da Quincena";
            $empleado = Empleado::find($request->empleado_id);
            $salarioRevisado = $empleado->reportePlanillaRevisado($anio, $mes_id, $quincena_id);
            $descuentos = [];
            $pagos = [];
            if (!is_null($salarioRevisado)) {
                $descuentos = $salarioRevisado->descuentos;
                $pagos = $salarioRevisado->pagos;
                throw new \Throwable("Este es un mensaje de error genérico.");
            }
            $puesto = $empleado->puesto;
            $departamento = $puesto->departamento;
            $descuentos = Descuento::all()->where('periodico', false);      //descuentos no periodicos que solo se aplicaran una vez
            $contrato_vigente = $empleado->contratos()->wherePivot('vigente', true)->first();
            $pagos = $contrato_vigente->pagos;      //pagos = asociados al tipo de contrato
            return view(
                'planilla_empleado_crear',
                compact('anio', 'mes_id', 'mes', 'quincena', 'quincena_id', 'empleado', 'puesto', 'departamento', 'descuentos', 'pagos')
            );
        } catch (\Throwable $th) {
            return view('planilla_empleado_revisado', compact('salarioRevisado', 'mes', 'quincena'));
        }
    }

    /**
     * Agrega el reporte de planilla de un empleado
     */
    public function guardarPlanilla(Request $request) {
        //dd($request);

        //try {
            $empleado = Empleado::find($request->empleado_id);
            $puesto = $empleado->puesto;
            $salario_ordinario = $puesto->salario_mensual;
            $contrato_vigente = $empleado->contratos()->wherePivot('vigente', true)->first();
            if ($contrato_vigente->pagoPorHora()) {
                $salario_ordinario = $puesto->salario_hora * $request->horas;
            }
            $fecha_inicio = Salario::obtenerFechaInicioPlanilla(
                $request->anio,
                $request->mes,
                $request->quincena,
                $request->empleado_id
            );
            $fecha_corte = Salario::obtenerFechaCortePlanilla(
                $request->anio,
                $request->mes,
                $request->quincena
            );
            //dd($fecha_inicio, $fecha_corte);
            
            /**Agregando a la base de datos */
            DB::beginTransaction();
            $salario = Salario::create([
                'empleado_id' => $empleado->id,
                'anio' => $request->anio,
                'mes'=> $request->mes,
                'quincena'=> $request->quincena,
                'fecha_inicio'=> Carbon::createFromFormat('d/m/Y', $fecha_inicio)->format('Y-m-d'),
                'fecha_corte'=> Carbon::createFromFormat('d/m/Y', $fecha_corte)->format('Y-m-d'),
                'horas_trabajadas'=> $request->horas,
                'salario_ordinario'=> $salario_ordinario,
                'revisado'=> true
            ]);

            //dd($request);

            //salario_descuento
            foreach ($request->descuentos as $descuento) {
                //dd($descuento['valor']);
                if (is_null($descuento['valor'])) {
                    $salario->descuentos()->attach(
                        $descuento['id'],
                        ['monto' => 0]
                    );
                }
                else {
                    $salario->descuentos()->attach(
                        $descuento['id'],
                        ['monto' => $descuento['valor']]
                    );
                }
            }
            //salario_pago
            if (!is_null($request->pagos)) {
                foreach ($request->pagos as $pago) {
                    if (is_null($pago['valor'])) {
                        $salario->pagos()->attach(
                            $pago['id'],
                            ['monto' => 0]
                        );
                    }
                    else {
                        $salario->pagos()->attach(
                            $pago['id'],
                            ['monto' => $pago['valor']]
                        );
                    }
                }
            }

            DB::commit();
        /*} catch (\Throwable $th) {
            DB::rollBack();
            return "error";
        }*/
        $meses = ["", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agostyo", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        $salarioRevisado = $salario;
        $mes = $meses[$salario->mes];
        $quincena = $salario->quincena==1? "1ra Quincena": "2da Quincena";
        return view('planilla_empleado_revisado', compact('salarioRevisado', 'mes', 'quincena'));
    }
}
