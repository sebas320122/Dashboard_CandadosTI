<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CandadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Extraer datos de archivo json
        $jsonData = Storage::get('/files/listaCandados.json');
        $dataArray = json_decode($jsonData, true, 512, JSON_THROW_ON_ERROR);
        $data = $dataArray['data'];

        //Eliminar registros pasados de la tabla
        DB::table('candados')->truncate();
        
        //Insertar datos de candados en tabla
        foreach ($data as $record){
            DB::table('candados')->insert([
                "Columna"=> $record['Columna'],
                "Nombre"=> $record['Nombre'],
                "Area" => $record['Area'],
                "Proceso" => $record['Proceso'],
                "Sistema" => $record['Sistema'],
                "Descripcion" => $record['Descripcion'],
                "Consulta" => $record['Consulta']
            ]);
        }

    }
}
