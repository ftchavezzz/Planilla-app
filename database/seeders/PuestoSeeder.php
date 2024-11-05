<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $puestos = [
            [
                'id' => '1',
                'departamento_id' => '1',
                'nombre' => 'Coordinador de Reclutamiento',
                'descripcion' => 'Este es un comentario de prueba y generado a traves de un seeder de laravel',
                'salario_mensual' => 1200,
                'salario_hora' => 40
            ],
            [
                'id' => '2',
                'departamento_id' => '1',
                'nombre' => 'Especialista en Capacitación',
                'descripcion' => 'Este es un comentario de prueba y generado a traves de un seeder de laravel',
                'salario_mensual' => 1200,
                'salario_hora' => 40
            ],
            [
                'id' => '3',
                'departamento_id' => '1',
                'nombre' => 'Analista de Desarrollo de Talento',
                'descripcion' => 'Este es un comentario de prueba y generado a traves de un seeder de laravel',
                'salario_mensual' => 1350,
                'salario_hora' => 45
            ],
            [
                'id' => '4',
                'departamento_id' => '2',
                'nombre' => 'Gerente de Publicidad',
                'descripcion' => 'Este es un comentario de prueba y generado a traves de un seeder de laravel',
                'salario_mensual' => 1050,
                'salario_hora' => 35
            ],
            [
                'id' => '5',
                'departamento_id' => '2',
                'nombre' => 'Diseñador Gráfico',
                'descripcion' => 'Este es un comentario de prueba y generado a traves de un seeder de laravel',
                'salario_mensual' => 1100,
                'salario_hora' => 40
            ],
            [
                'id' => '6',
                'departamento_id' => '2',
                'nombre' => 'Analista de Mercado',
                'descripcion' => 'Este es un comentario de prueba y generado a traves de un seeder de laravel',
                'salario_mensual' => 1050,
                'salario_hora' => 35
            ],
            [
                'id' => '7',
                'departamento_id' => '2',
                'nombre' => 'Especialista en Análisis de Datos',
                'descripcion' => 'Este es un comentario de prueba y generado a traves de un seeder de laravel',
                'salario_mensual' => 1500,
                'salario_hora' => 50
            ],
            [
                'id' => '8',
                'departamento_id' => '3',
                'nombre' => 'Contador General',
                'descripcion' => 'Este es un comentario de prueba y generado a traves de un seeder de laravel',
                'salario_mensual' => 1000,
                'salario_hora' => 35
            ],
            [
                'id' => '9',
                'departamento_id' => '3',
                'nombre' => 'Asistente Contable',
                'descripcion' => 'Este es un comentario de prueba y generado a traves de un seeder de laravel',
                'salario_mensual' => 900,
                'salario_hora' => 25
            ],
            [
                'id' => '10',
                'departamento_id' => '3',
                'nombre' => 'Analista Financiero',
                'descripcion' => 'Este es un comentario de prueba y generado a traves de un seeder de laravel',
                'salario_mensual' => 1200,
                'salario_hora' => 40
            ],
            [
                'id' => '11',
                'departamento_id' => '4',
                'nombre' => 'Analista de Sistemas',
                'descripcion' => 'Este es un comentario de prueba y generado a traves de un seeder de laravel',
                'salario_mensual' => 2000,
                'salario_hora' => 70
            ],
            [
                'id' => '12',
                'departamento_id' => '4',
                'nombre' => 'Administrador de Bases de Datos',
                'descripcion' => 'Este es un comentario de prueba y generado a traves de un seeder de laravel',
                'salario_mensual' => 2000,
                'salario_hora' => 70
            ],
            [
                'id' => '13',
                'departamento_id' => '5',
                'nombre' => 'Gerente de Ventas',
                'descripcion' => 'Este es un comentario de prueba y generado a traves de un seeder de laravel',
                'salario_mensual' => 1500,
                'salario_hora' => 55
            ],
            [
                'id' => '14',
                'departamento_id' => '5',
                'nombre' => 'Representante de Ventas',
                'descripcion' => 'Este es un comentario de prueba y generado a traves de un seeder de laravel',
                'salario_mensual' => 500,
                'salario_hora' => 17
            ],
            [
                'id' => '15',
                'departamento_id' => '6',
                'nombre' => 'Gerente de Operaciones',
                'descripcion' => 'Este es un comentario de prueba y generado a traves de un seeder de laravel',
                'salario_mensual' => 1000,
                'salario_hora' => 30
            ],
            [
                'id' => '16',
                'departamento_id' => '6',
                'nombre' => 'Encargado de Bodega',
                'descripcion' => 'Este es un comentario de prueba y generado a traves de un seeder de laravel',
                'salario_mensual' => 500,
                'salario_hora' => 20
            ],
        ];
        DB::table('puestos')->insert($puestos);
    }
}
