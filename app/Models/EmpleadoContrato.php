<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoContrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'contrato_id',
        'fecha_inicio',
        'fecha_fin',
        'vigente',
    ];

    protected $attributes = [
        'fecha_fin' => null,
        'vigente' => true
    ];
}
