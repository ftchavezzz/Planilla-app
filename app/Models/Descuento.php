<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    /**
     * Devuelve un arreglo con el nombre de cada tipo de descuento
     */
    public static function obtenerNombres(){
        return self::pluck('nombre')->toArray();
    }

    public function empleados() {
        return $this->belongsToMany(Empleado::class, 'empleado_descuento', 'descuento_id', 'empleado_id');
    }
}
