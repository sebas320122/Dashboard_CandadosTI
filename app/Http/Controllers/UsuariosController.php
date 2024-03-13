<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class UsuariosController extends Controller
{
    public function showUsuario($id){
        
        $usuario = User::find($id);
        return view('config_opcion/AdministrarUsuarios/infousuario',[
            'usuario' => $usuario
        ]);
    }

    public function showEditUsuario($id){

        if (! Gate::allows('administrar_usuarios',Auth::user())) {
            return redirect()->back()->with('error','No cuentas con permisos para editar usuarios');
        }

        $usuario = User::find($id);
        return view('config_opcion/AdministrarUsuarios/editusuario',[
            'usuario' => $usuario
        ]);
    }

    public function update(Request $request, $id){
        //Revisar rol de usuario actual
        if (! Gate::allows('administrar_usuarios',Auth::user())) {
            return redirect()->back()->with('error','No cuentas con permisos para administrar usuarios');
        }

        try{
            $usuario = User::find($id);
            $usuario->update($request->all());
            return redirect()->route('usuario.show', $usuario->id)
            ->with('success', 'Se modifico los datos del usuario');
        }catch(\Exception $e){
        return redirect()->back()->with('error','Error');
        }
        
    }

    public function showAgregarUsuario(){
        if (! Gate::allows('administrar_usuarios',Auth::user())) {
            return redirect()->back()->with('error','No cuentas con permisos para agregar usuarios');
        }

        return view('config_opcion/AdministrarUsuarios/agregarusuario');
    }

    public function store(Request $request){
        //Revisar rol de usuario actual
        if (! Gate::allows('administrar_usuarios',Auth::user())) {
            return redirect()->back()->with('error','No cuentas con permisos para agregar usuarios');
        }
        try{
            User::create($request->all());  
            return redirect()->back()->with('success', 'Usuario agregado');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Error');
            }
    }
    
    public function destroy($id){
        //Revisar rol de usuario actual
        if (! Gate::allows('administrar_usuarios',Auth::user())) {
            return redirect()->back()->with('error','No cuentas con permisos para eliminar usuarios');
        }

        try{
            $usuario = User::find($id);
            $usuario->delete();
            return redirect()->route('usuario.agregar')
            ->with('success', 'Se elimino el usuario');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Error');
            }
    }

    

}
