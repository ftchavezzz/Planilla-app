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
        return $this->belongsToMany(Descuento::class, 'empleado_descuento', 'empleado_id', 'descuento_id');
    }

    public function contratos() {
        return $this->belonsToMany(Contrato::class, 'empleado_contratos', 'empleado_id', 'contrato_id');
    }

    /**
     * Devuelve el salario bruto del empleado
     */
    public function obtenerSalarioBruto() {
        $puestoEmpleado = $this->puesto;
        $salarioBruto = $puestoEmpleado->salario_mensual;
        //verificar si el contrato tiene un salario fijo o se calcula por hora
        //para probar se utilizara por defecto que tiene un salario fijo
        return $salarioBruto;
    }

    /**
     * Devuelve un arreglo que contiene el valor de descuento que se aplicara a cada tipo de descuento
     */
    public function calcularDescuentos() {
        $salarioBrutoQuincenal = $this->obtenerSalarioBruto() / 2;
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
