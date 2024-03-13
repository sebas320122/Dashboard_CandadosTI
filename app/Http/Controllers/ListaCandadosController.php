<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Candados;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ListaCandadosController extends Controller
{
    public function showCandado($id){
        
        $candadomuestra = Candados::find($id);
        return view('config_opcion/ListaDeCandados/infocandado',[
            'candadomuestra' => $candadomuestra
        ]);
    
    }

    public function destroy($id){

        if (! Gate::allows('administrar_candados',Auth::user())) {
            return redirect()->back()->with('error','No cuentas con permisos para eliminar candados');
        }

        $candadomuestra = Candados::find($id);
        $candadomuestra->delete();
        return redirect()->route('candado.agregar')
        ->with('success', 'Se elimino el candado');
    }

    public function showEditCandado($id){
        if (! Gate::allows('administrar_candados',Auth::user())) {
            return redirect()->back()->with('error','No cuentas con permisos para editar candados');
        }

        $candadomuestra = Candados::find($id);
        
        return view('config_opcion/ListaDeCandados/editcandado',[
            'candadomuestra' => $candadomuestra
        ]);
    }

    public function update(Request $request, $id){
        if (! Gate::allows('administrar_candados',Auth::user())) {
            return redirect()->back()->with('error','No cuentas con permisos para editar candados');
        }

        try{
            $candadomuestra = Candados::find($id);
            $candadomuestra->update($request->all());
            return redirect()->route('candado.show', $candadomuestra->id)
            ->with('success', 'Se modifico los datos del candado');
        }catch(\Exception $e){
        return redirect()->back()->with('error','Error');
        }
        
    }

    public function showAgregarCandado(){

        if (! Gate::allows('administrar_candados',Auth::user())) {
            return redirect()->back()->with('error','No cuentas con permisos para agregar candados');
        }
        return view('config_opcion/ListaDeCandados/agregarcandado');
    }

    public function store(Request $request){

        if (! Gate::allows('administrar_candados',Auth::user())) {
            return redirect()->back()->with('error','No cuentas con permisos para agregar candados');
        }

      try{
        Candados::create($request->all());
        return redirect()->back()->with('success', 'Candado agregado');
      }catch(\Exception $e){
        return redirect()->back()->with('error','Error');
        }
    }
}
