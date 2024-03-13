<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reportes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ReportesController extends Controller
{
    public function showReporte($id){
        $reporte = Reportes::find($id);
        return view('config_opcion/RegistroDeReportes/inforeporte',[
            'reporte' => $reporte
        ]);
    }

    public function showEditReporte($id){
        if (! Gate::allows('administrar_reportes',Auth::user())) {
            return redirect()->back()->with('error','No cuentas con permisos para editar reportes');
        }

        $reporte = Reportes::find($id);
        
        return view('config_opcion/RegistroDeReportes/editreporte',[
            'reporte' => $reporte
        ]);
    }

    public function update(Request $request, $id)
    {
        if (! Gate::allows('administrar_reportes',Auth::user())) {
            return redirect()->back()->with('error','No cuentas con permisos para editar reportes');
        }
        try{
            $reporte = Reportes::find($id);
            $reporte->Valido = $request->Valido;
            $reporte->save();
            return redirect()->route('reporte.show', $reporte->id)
            ->with('success', 'Se modifico la validez del reporte');
        }catch(\Exception $e){
        return redirect()->back()->with('error','Error');
        }
        
    }
}
