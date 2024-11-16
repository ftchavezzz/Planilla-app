<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoDescuento extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'descuento_id',
        'monto',
    ];

    // En el modelo EmpleadoDescuento
    public function descuento()
    {
        return $this->belongsTo(Descuento::class, 'descuento_id', 'id');
    }
}