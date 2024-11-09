<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'puesto_id',
        'nombre',
        'dui',
        'telefono_fijo',
        'telefono_mobile',
        // 'fecha_ingreso',
        'fecha_nacimiento',
        // 'email',
        // 'activo'
    ];
}
