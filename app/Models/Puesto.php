<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'salario_mensual',
        'salario_hora'
    ];
    
    public function empleados() {
        return $this->hasMany(Empleado::class);
    }

    public function departamento() {
        return $this->belongsTo(Departamento::class);
    }
}
