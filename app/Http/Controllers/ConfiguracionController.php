<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfiguracionController extends Controller
{
    public function showSubir(){
        return view('config_opcion/subirReporte');
    }

    public function showCandados(){
        $candados = DB::table('candados')->get();
        return view('config_opcion/ListaDeCandados/listacandados', 
        ['candados' => $candados]
        );
    }

    public function showReportes(){
        $reportes = DB::table('reportes')
        ->orderBy('id','desc')
        ->get();
        return view('config_opcion/RegistroDeReportes/listareportes', 
        ['reportes' => $reportes]
        );
    }

    public function showUsuarios(){
        $usuarios = DB::table('users')->get();
        return view('config_opcion/AdministrarUsuarios/listausuarios', 
        ['usuarios' => $usuarios]
        );
    }
}
