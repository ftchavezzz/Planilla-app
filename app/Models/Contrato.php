<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_contrato',
        'porcentaje_salario_horario'
    ];

    /**
     * Determina si el contrato tiene salario fijo o no
     */
    public function tieneSalarioFijo() {
        //si el valor del porcentaje es null entonces significa que tiene un salario fijo
        //de lo contrario el salario base se calculara con base a las horas trabajadas por el empleado
        return is_null($this->porcentaje_salario_horario);
    }

    public function pagos() {
        return $this->belongsToMany(Pago::class);
    }

    public function empleados() {
        return $this->belonsToMany(Empleado::class, 'empleado_contratos', 'contrato_id', 'empleado_id');
    }
}
