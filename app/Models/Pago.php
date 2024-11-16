<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion' 
    ];

    public function contratos() {
        return $this->belongsToMany(Contrato::class);
    }

    private function salarios() {
        return $this->belongsToMany(Salario::class, 'salario_pago')->withPivot('monto');
    }

    /**
     * Devuelve un arreglo con el nombre de cada tipo de pago
     */
    public static function obtenerNombres(){
        return self::pluck('nombre')->toArray();
    }

    /**
     * Determina si un tipo de remuneracion aplica para el descuento rentsobre la renta
     */
    public function esDeducible() {
        return $this->id <> 5;  //el numero 5 es el pago del aguinaldo y no aplica para descuento
    }

    /**
     * Devuelve los pagos aplicables del salario en cuestion
     */
    public static function obtenerPagosQuincenales($salario_id) {
        $salario = Salario::find($salario_id);
        $pagos = $salario->pagos;
        $pagosOpcionales = Pago::all();
        $pagosAplicables = [];
        $indice = 0;

        foreach ($pagosOpcionales as $pagoOpcional) {
            $pagosAplicables[] = 0;
        }
        foreach ($pagosOpcionales as $key => $pagoOpcional) {
            foreach ($pagos as $pago) {
                if($pagoOpcional->id == $pago->id) {
                    $pagosAplicables[$key] = $pago->pivot->monto;
                }
            }
        }
        return $pagosAplicables;
    }

    public static function obtenerMontoPagosQuincenalesNoDeducible($salario_id) {
        $salario = Salario::find($salario_id);
        $pagos = $salario->pagos;
        $total = 0;
        foreach ($pagos as $pago) {
            if (!$pago->esDeducible()) {
                $total += $pago->pivot->monto;
            }
        }
        return $total;
    }
}
