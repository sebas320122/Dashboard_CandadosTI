<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MenuController extends Controller
{
    public function showInicio(){
        
        //Reportes para resumen
        $registroReportes = DB::table('reportes')
        ->select('Candados', 'Registros', 'Usuario', 'Fecha')
        ->where('Valido', '=', 1)
        ->orderBy('Fecha', 'desc')
        ->limit(8) 
        ->get();
    
        $pasadosDos = $registroReportes->take(2);
        $resumenActual = $pasadosDos->first();
       
        if ($registroReportes->count() >= 2){
            $resumenAnterior = $pasadosDos->last(); 
            $IncrCandados = round(($resumenActual->Candados - $resumenAnterior->Candados) / $resumenAnterior->Candados * 100,1);
            $IncrRegistros = round(($resumenActual->Registros - $resumenAnterior->Registros) / $resumenAnterior->Registros * 100,1);    
        }else if($registroReportes->count() == 1){
            $IncrCandados = 0;
            $IncrRegistros = 0;
        }
        else{
            $IncrCandados = 0;
            $IncrRegistros = 0;
            unset($resumenActual);
            $resumenActual = (object)array();
            $resumenActual->Candados = 0;
            $resumenActual->Registros = 0;
            $resumenActual->Usuario = 'Nombre';
            $resumenActual->Fecha = now();
        }
       
        //Reportes para tabla por area y grafica cirucilar
        $porArea = DB::table('reporte_temp')
        ->select('Area',DB::raw('COUNT(Usuario) as Candados'),DB::raw('SUM(Registros) as Registros'))
        ->groupBy('Area')
        ->orderBy(DB::raw('COUNT(Usuario)'),'desc')
        ->get();

        return view('inicio', [
            'registroReportes' => $registroReportes,
            'resumenActual' => $resumenActual,
            'IncrCandados' => $IncrCandados,
            'IncrRegistros' => $IncrRegistros,
            'porArea' => $porArea,
            
        ]);
    }

    public function showFallas(){
        $porAreaProceso = DB::table('reporte_temp')
        ->select('Area','Proceso',DB::raw('COUNT(Area) as Candados'),DB::raw('SUM(Registros) as Registros'))
        ->groupBy('Area','Proceso')
        ->get();
        
        $candados= DB::table('reporte_temp')
        ->leftJoin('candados', 'candados.Nombre', '=', 'reporte_temp.Candado')
        ->select('reporte_temp.Area','reporte_temp.Proceso',
        'reporte_temp.Candado','reporte_temp.Registros',
        'candados.Descripcion','candados.Consulta')
        ->get();

        return view('fallas', [
            'porAreaProceso' => $porAreaProceso,
            'candados' => $candados
        ]);
    }

    public function showConfiguracion(){
        
        return view('configuracion');
    }

    
}
