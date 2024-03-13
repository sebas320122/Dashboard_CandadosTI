<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ReporteTemp;
use App\Models\Reportes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Gate;

class UploadController extends Controller
{
    public function upload(Request $request){
        //Revisar rol de usuario actual
        if (! Gate::allows('upload',Auth::user())) {
            return redirect()->back()->with('error','No cuentas con permisos para subir reportes');
        }

        $request->validate([
            'reporte' => 'required|mimes:json'
        ]);

        try{
            //Eliminar json de reporte pasado
            Storage::delete('/files/reporteTmp.json');  
            $path = $request->file('reporte')->storeAs('files', 'reporteTmp.json');
            $this->jsonToTable();
            $this->toTableReportes();    
            return redirect()->back()->with('success','El reporte se ha subido');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Error en el controlador');
        }
    }
    
    public function jsonToTable(){
        $jsonData = Storage::get('/files/reporteTmp.json');
        $dataArray = json_decode($jsonData, true, 512, JSON_THROW_ON_ERROR);
        $data = $dataArray['data'];

        //Eliminar registros del reporte pasado
        ReporteTemp::truncate();

        $fechaActual = now();
        foreach ($data as $record) {
            ReporteTemp::create([
                'Candado' => $record['Candado'],
                'Area' => $record['Area'],
                'Proceso' => $record['Tipo'],
                'Registros' => $record['COUNT'],
                'Usuario' => Auth::user()->name,
                'Fecha' => $fechaActual,
            ]);
        }
    }

    public function toTableReportes(){
        //Por medio de query
        $resultados = ReporteTemp::select(DB::raw('COUNT(Usuario) as Candados'),DB::raw('SUM(Registros) as Registros'),'Usuario','Fecha',)
        ->groupBy('Usuario', 'Fecha')
        ->get();

        foreach ($resultados as $resultado) {
        Reportes::create([
            'Candados' => $resultado->Candados,
            'Registros' => $resultado->Registros,
            'Usuario' => $resultado->Usuario,
            'Fecha' => $resultado->Fecha,
            'Valido' => 1
        ]);
        }
    }
    
}
