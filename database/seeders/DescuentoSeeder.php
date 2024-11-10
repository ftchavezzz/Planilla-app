<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DescuentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('descuentos')->insert([
            ['id' => '1', 'nombre' => 'Beneficio de Cafeteria', 'descripcion' => 'El empleado puede pagar con el numero de su carnet de trabajo'],
            ['id' => '2', 'nombre' => 'Ajuste por Sobrepago', 'descripcion' => 'Descuento que sera procesado por un error de planilla en el pago anterior'],
            ['id' => '3', 'nombre' => 'OID Banco Cuscatlan', 'descripcion' => 'Orden irrevocable de descuento firmado por RRHH'],
            ['id' => '4', 'nombre' => 'OID Banco America Central', 'descripcion' => 'Orden irrevocable de descuento firmado por RRHH'],
            ['id' => '5', 'nombre' => 'OID Banco Agricola', 'descripcion' => 'Orden irrevocable de descuento firmado por RRHH'],
            ['id' => '6', 'nombre' => 'OID Banco Azteca', 'descripcion' => 'Orden irrevocable de descuento firmado por RRHH'],
            ['id' => '7', 'nombre' => 'OID Banco Scotiabank', 'descripcion' => 'Orden irrevocable de descuento firmado por RRHH'],
            ['id' => '8', 'nombre' => 'OID Banco Azul', 'descripcion' => 'Orden irrevocable de descuento firmado por RRHH'],
            ['id' => '9', 'nombre' => 'OID Cajas de Credito', 'descripcion' => 'Orden irrevocable de descuento firmado por RRHH'],
            ['id' => '10', 'nombre' => 'Descuentos por Préstamos', 'descripcion' => 'Descuento aplicado segun la cuota calculada en base al prestamo realizado'],
            ['id' => '11', 'nombre' => 'Descuentos por Ausentismo', 'descripcion' => 'Descuento con permiso'],
            ['id' => '12', 'nombre' => 'Descuentos por Daños Materiales', 'descripcion' => 'Descuento por daños materiales responsabilidad del empleado'],
            ['id' => '13', 'nombre' => 'Descuentos por Adelanto Salarial', 'descripcion' => 'Descuento aplicado segun el monto otorgado'],
        ]);
    }
}
