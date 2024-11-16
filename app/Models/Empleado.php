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
        'telefono_movil',
        'fecha_ingreso',
        'fecha_nacimiento',
        'email',
        'activo',
    ];

    protected $attributes = [
        'activo' => true
    ];

    public function puesto() {
        return $this->belongsTo(Puesto::class);
    }

    public function descuentos() {
        return $this->belongsToMany(Descuento::class, 'empleado_descuentos', 'empleado_id', 'descuento_id');
    }

    public function contratos() {
        return $this->belongsToMany(Contrato::class, 'empleado_contratos', 'empleado_id', 'contrato_id');
    }

    public function salarios() {
        return $this->hasMany(Salario::class);
    }

    /**
     * Devuelve un valor booleano que determina si ya existe un reporte enviado en el periodo determinado
     */
    public function reportePlanillaRevisado($anio, $mes, $quincena) {
        $salario = $this->salarios()->where('anio', $anio)->where('mes', $mes)->where('quincena', $quincena)->get();
        return count($salario) > 0? $salario[0]: null;
    }

    /**
     * Devuelve el salario bruto del empleado el cual incluye el salario y las remuneraciones adicionales
     */
    public function obtenerSalarioBrutoQuincenal($salario_id) {
        $salario = Salario::find($salario_id);
        $pagos = $salario->pagos;
        $totalSalarioRemuneraciones = $salario->salario_ordinario;
        foreach ($pagos as $pago) {
            if ($pago->esDeducible()) {
                $totalSalarioRemuneraciones += $pago->pivot->monto;
            }
        }
        return $totalSalarioRemuneraciones;
    }


    
    public function calcularDescuentos() {
        $salarioBrutoQuincenal = $this->obtenerSalarioBrutoQuincenal();
        $descuentosLey = Leydescuento::obtenerDescuentosLeyQuincenales($salarioBrutoQuincenal);
        $descuentosOpcionales = Descuento::all();
        $descuentos = [];

        //agregando los descuentos de ley
        foreach ($descuentosLey as $descuentoLey) {
            $descuentos[] = $descuentoLey;
        }

        //agregando los descuentos opcionales
        foreach ($descuentosOpcionales as $descuentoOpcional) {
            $montoDescuento = 0;
            //si tiene el descuento asociado, entonces colocarlo
            //if($descuentoOpcional->empleados->contains($this->id)) {
            if ($this->descuentos->contains($descuentoOpcional->id)) {
                $montoDescuento = 5;
            }
            $descuentos[] = $montoDescuento / 2;
        }
        return $descuentos;
    }
}
