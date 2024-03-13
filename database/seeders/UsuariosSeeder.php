<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            "name"=> 'Administrador',
            "email"=> 'Administrador@gmail.com',
            "password" => Hash::make('123456789'),
            "Puesto" => 'Auditoria Administrativa',
            "Rol" => 'Administrador',
            "Oficina" => 'USO'
        ]);

        //Registros de reporte para pruebas de graficas
        //
        DB::table('reportes')->truncate();
        DB::table('reportes')->insert([
            [
            "Candados"=> 10,
            "Registros"=> 5000,
            "Usuario" => 'Jose',
            "Fecha" => '2023-11-02 15:15:55',
            "Valido" => 1
            ],
            [
            "Candados"=> 13,
            "Registros"=> 6000,
            "Usuario" => 'Juan',
            "Fecha" => '2023-11-12 15:15:55',
            "Valido" => 1
            ],
            [
            "Candados"=> 17,
            "Registros"=> 4000,
            "Usuario" => 'Jose',
            "Fecha" => '2023-11-22 15:15:55',
            "Valido" => 1
            ],
            [
            "Candados"=> 23,
            "Registros"=> 8000,
            "Usuario" => 'Jose',
            "Fecha" => '2023-11-30 15:15:55',
            "Valido" => 1
            ],
            [
            "Candados"=> 25,
            "Registros"=> 15000,
            "Usuario" => 'Juan',
            "Fecha" => '2023-12-02 15:15:55',
            "Valido" => 1
            ],
            [
            "Candados"=> 40,
            "Registros"=> 37000,
            "Usuario" => 'Juan',
            "Fecha" => '2023-12-12 15:15:55',
            "Valido" => 1
            ],
            [
            "Candados"=> 52,
            "Registros"=> 70000,
            "Usuario" => 'Jose',
            "Fecha" => '2023-12-15 15:15:55',
            "Valido" => 1
            ]
        ]);
        //
        
    }
}
