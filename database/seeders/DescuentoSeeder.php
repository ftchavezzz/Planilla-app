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
            ['id' => '1', 'nombre' => 'Descuento por ajuste por sobrepago', 'periodico' => false, 'descripcion' => 'Descuento que sera procesado por un error de planilla en el pago anterior'],
            ['id' => '2', 'nombre' => 'Descuento por permiso sin goce de sueldo', 'periodico' => false,  'descripcion' => 'Descuento con permiso'],
            ['id' => '3', 'nombre' => 'Descuento por daños materiales acumulados', 'periodico' => true,  'descripcion' => 'Descuento por daños materiales responsabilidad del empleado'],
            ['id' => '4', 'nombre' => 'OID Banco Cuscatlan', 'periodico' => true,  'descripcion' => 'Orden irrevocable de descuento firmado por RRHH'],
            ['id' => '5', 'nombre' => 'OID Banco America Central', 'periodico' => true,  'descripcion' => 'Orden irrevocable de descuento firmado por RRHH'],
            ['id' => '6', 'nombre' => 'OID Banco Agricola', 'periodico' => true,  'descripcion' => 'Orden irrevocable de descuento firmado por RRHH'],
            ['id' => '7', 'nombre' => 'OID Banco Azteca', 'periodico' => true,  'descripcion' => 'Orden irrevocable de descuento firmado por RRHH'],
            ['id' => '8', 'nombre' => 'OID Banco Scotiabank', 'periodico' => true,  'descripcion' => 'Orden irrevocable de descuento firmado por RRHH'],
            ['id' => '9', 'nombre' => 'OID Banco Azul', 'periodico' => true,  'descripcion' => 'Orden irrevocable de descuento firmado por RRHH'],
            ['id' => '10', 'nombre' => 'OID Cajas de Credito', 'periodico' => true,  'descripcion' => 'Orden irrevocable de descuento firmado por RRHH'],
        ]);
    }
}
