<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leydescuento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'porcentaje' 
    ];

    /**
     * Devuelve un arreglo con el nombre de cada tipo de descuento
     */
    public static function obtenerNombres(){
        return self::pluck('nombre')->toArray();
    }

    private function salarios() {
        return $this->belonsToMany(Salario::class);
    }

    /**
     * Calcula los descuentos de ley aplicables y los devuelve en un arreglo de valores reales
     */
    public static function obtenerDescuentosLeyQuincenales($salarioBrutoQuincenal) {
        //definicion de variables
        $indiceAFP = 1;
        $indiceISSS = 2;
        $indiceRenta = 3;
        $baseImponible = $salarioBrutoQuincenal;    //para el calculo de renta
        $descuentos = [];

        //Calculo de descuentos AFP e ISSS
        $descuentos[] = $salarioBrutoQuincenal * LeyDescuento::find($indiceAFP)->porcentaje;
        $descuentos[] = $salarioBrutoQuincenal * LeyDescuento::find($indiceISSS)->porcentaje;

        //Calculo del descuento de renta (TABLA DE RETENCION DE IMPUESTO SOBE LA RENTA)
        $limite1 = 236.00;  //limites de exoneracion
        $limite2 = 447.62;
        $limite3 = 1019.05;

        $p1 = 0.1;  //porcentaje sobre el exceso
        $p2 = 0.2;
        $p3 = 0.3;

        $cuota1 = 8.84;     //cuotas fijas
        $cuota2 = 30;
        $cuota3 = 144.29;

        $descuento[] = 0.00;
        $baseImponible = $salarioBrutoQuincenal - $descuentos[$indiceAFP-1] - $descuentos[$indiceISSS-1];
        if ($baseImponible > 0 && $baseImponible <= $limite1) {     //primer tramo (sin retencion)
            $descuentos[$indiceRenta - 1] = 0.00;
        }
        else if ($baseImponible > $limite1 && $baseImponible <= $limite2) {     //segundo tramo
            $descuentos[$indiceRenta - 1] = ($baseImponible - $limite1) * $p1 + $cuota1;
        }
        else if ($baseImponible > $limite2 && $baseImponible <= $limite3) {     //tercer tramo
            $descuentos[$indiceRenta - 1] = ($baseImponible - $limite2) * $p2 + $cuota2;
        }
        else if ($baseImponible > $limite3) {   //cuarto tramo
            $descuentos[$indiceRenta - 1] = ($baseImponible - $limite3) * $p3 + $cuota3;
        }
        return $descuentos;
    }
}
