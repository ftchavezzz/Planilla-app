<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empleados = [
            [
                'id' => '1',
                'puesto_id' => '1',
                'nombre' => 'Juan Pérez',
                'dui' => '01234567-8',
                'telefono_fijo' => '2222-3333',
                'telefono_movil' => '7777-8888',
                'fecha_ingreso' => '2020-01-10',
                'fecha_nacimiento' => '1985-03-15',
                'activo' => false,
            ],
            [
                'id' => '2',
                'puesto_id' => '2',
                'nombre' => 'María Gómez',
                'dui' => '87654321-0',
                'telefono_fijo' => '2222-4444',
                'telefono_movil' => '7888-9999',
                'fecha_ingreso' => '2019-05-20',
                'fecha_nacimiento' => '1990-07-22',
                'activo' => true,
            ],
            [
                'id' => '3',
                'puesto_id' => '2',
                'nombre' => 'Carlos López',
                'dui' => '13579246-1',
                'telefono_fijo' => '2222-5555',
                'telefono_movil' => '7444-6666',
                'fecha_ingreso' => '2021-03-15',
                'fecha_nacimiento' => '1988-11-30',
                'activo' => true,
            ],
            [
                'id' => '4',
                'puesto_id' => '3',
                'nombre' => 'Ana Torres',
                'dui' => '24680135-2',
                'telefono_fijo' => '2222-6666',
                'telefono_movil' => '7111-2222',
                'fecha_ingreso' => '2022-06-01',
                'fecha_nacimiento' => '1995-01-05',
                'activo' => false,
            ],
            [
                'id' => '5',
                'puesto_id' => '1',
                'nombre' => 'Luis Martínez',
                'dui' => '98765432-9',
                'telefono_fijo' => '2222-7777',
                'telefono_movil' => '7333-4444',
                'fecha_ingreso' => '2021-11-12',
                'fecha_nacimiento' => '1983-09-17',
                'activo' => true,
            ],
            [
                'id' => '6',
                'puesto_id' => '5',
                'nombre' => 'Sofía Fernández',
                'dui' => '65432187-6',
                'telefono_fijo' => '2222-8888',
                'telefono_movil' => '7999-5555',
                'fecha_ingreso' => '2020-08-25',
                'fecha_nacimiento' => '1992-04-29',
                'activo' => true,
            ],
            [
                'id' => '7',
                'puesto_id' => '5',
                'nombre' => 'Jorge Ramírez',
                'dui' => '32165487-3',
                'telefono_fijo' => '2222-9999',
                'telefono_movil' => '7222-3333',
                'fecha_ingreso' => '2018-07-15',
                'fecha_nacimiento' => '1980-12-12',
                'activo' => true,
            ],
            [
                'id' => '8',
                'puesto_id' => '6',
                'nombre' => 'Paula Ruiz',
                'dui' => '45678912-4',
                'telefono_fijo' => '2222-1010',
                'telefono_movil' => '7111-5555',
                'fecha_ingreso' => '2023-02-20',
                'fecha_nacimiento' => '1994-10-05',
                'activo' => true,
            ]
        ];
        
        DB::table('empleados')->insert($empleados);
    }
}
