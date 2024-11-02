<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salario extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_inicio',
        'fecha_corte',
        'salario_ordinario',
        'pago_bruto',
        'pago_realizado' 
    ];
}
