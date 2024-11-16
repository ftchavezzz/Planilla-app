<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'periodico'
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

    public function salarios() {
        return $this->belongsToMany(Salario::class, 'salario_descuento')->withPivot('monto');
    }

    public static function ObtenerDescuentosQuincenales($salario_id) {
        $salario = Salario::find($salario_id);
        $descuentos = $salario->descuentos;
        $descuentosOpcionales = Descuento::all();
        $descuentosAplicables = [];
        //dd($descuentosOpcionales);
        foreach ($descuentosOpcionales as $descuentOpcional) {
            $descuentosAplicables[] = 0;
        }
        foreach ($descuentosOpcionales as $key => $descuentOpcional) {
            foreach ($descuentos as $descuento) {
                if($descuentOpcional->id == $descuento->id) {
                    $descuentosAplicables[$key] = $descuento->pivot->monto;
                }
            }
        }
        return $descuentosAplicables;
    }
}
