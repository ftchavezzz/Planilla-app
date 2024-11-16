<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Salario extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'anio',
        'mes',
        'quincena',
        'fecha_inicio',
        'fecha_corte',
        'horas_trabajadas',
        'salario_ordinario',
        'pago_bruto',
        'pago_realizado',
        'revisado',
        'procesado'
    ];

    protected $attributes = [
        'pago_bruto' => 0.00,
        'pago_realizado'  => 0.00,
        'procesado' => false
        
    ];

    public function empleado() {
        return $this->belongsTo(Empleado::class);
    }

    public function descuentos() {
        return $this->belongsToMany(Descuento::class, 'salario_descuento')->withPivot('monto');
    }

    public function leydescuentos() {
        return $this->belongsToMany(Leydescuento::class);
    }

    public function pagos() {
        return $this->belongsToMany(Pago::class, 'salario_pago')->withPivot('monto');
    }

    /**
     * Devuelve un string representando la fecha a partir de la cual se calcula la planilla (por defecto)
     */
    public static function obtenerFechaInicioPlanilla($anio, $mes, $quincena, $empleado_id) {
        $fecha_inicio_periodo_string = "";
        if ($quincena==1) {
            $fecha_inicio_periodo_string = '26/' . ($mes - 1) . '/' . $anio;
        } else {
            $fecha_inicio_periodo_string = '11/' . $mes . '/' . $anio;
        }
        return $fecha_inicio_periodo_string;
    }

    /**
     * Devuelve un string representando la fecha a de corte hasta la cual se calcula la planilla
     */
    public static function obtenerFechaCortePlanilla($anio, $mes, $quincena) {
        $fecha_corte_periodo_string = "";
        if ($quincena==1) {
            $fecha_corte_periodo_string = '10/' . $mes . '/' . $anio;
        } else {
            $fecha_corte_periodo_string = '25/' . $mes . '/' . $anio;
        }
        return $fecha_corte_periodo_string;
    }
}
