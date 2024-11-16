<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_contrato',
        'pago_por_hora'
    ];

    public function pagos() {
        return $this->belongsToMany(Pago::class);
    }

    public function empleados() {
        return $this->belongsToMany(Empleado::class, 'empleado_contratos', 'contrato_id', 'empleado_id');
    }

    /**
     * Determina si el contrato tiene salario fijo o no
     */
    public function pagoPorHora() {
        return $this->pago_por_hora;
    }
}
