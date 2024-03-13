<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListaCandadosController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\LoginController;

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});



//Rutas

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'showAuth')->name('r.inicio');
    Route::post('login', 'authenticate')->name('r.login');
    Route::get('salir', 'logout')->name('r.logout');
});

Route::middleware(['auth'])->group(function (){

    Route::controller(MenuController::class)->group(function () {
        Route::get('inicio', 'showInicio');
        Route::get('fallas', 'showFallas');
        Route::get('configuracion', 'showConfiguracion');
    });

    Route::controller(ConfiguracionController::class)->group(function () {
        Route::get('configuracion/subir-reporte', 'showSubir');
        Route::get('configuracion/lista-candados', 'showCandados');
        Route::get('configuracion/reportes', 'showReportes');
        Route::get('configuracion/usuarios', 'showUsuarios')->name('cfg.usuarios');
    });

    Route::controller(UploadController::class)->group(function () {
        Route::post('configuracion/subir-reporte', 'upload')->name('reporte.upload');
    });

    Route::controller(ListaCandadosController::class)->group(function () {
        Route::get('configuracion/lista-candados/{id}/editar', 'showEditCandado')->name('candado.editar');
        Route::put('configuracion/lista-candados/{id}', 'update')->name('candado.update');

        Route::get('configuracion/lista-candados/agregar', 'showAgregarCandado')->name('candado.agregar');
        Route::post('configuracion/lista-candados/agregar', 'store')->name('candado.store');

        Route::get('configuracion/lista-candados/{id}', 'showCandado')->name('candado.show');
        Route::delete('configuracion/lista-candados/{id}', 'destroy')->name('candado.destroy');
    });

    Route::controller(UsuariosController::class)->group(function () {
        Route::get('configuracion/usuarios/agregar', 'showAgregarUsuario')->name('usuario.agregar');
        Route::post('configuracion/usuarios/agregar', 'store')->name('usuario.store');

        Route::get('configuracion/usuarios/{id}', 'showUsuario')->name('usuario.show');
        Route::get('configuracion/usuarios/{id}/editar', 'showEditUsuario')->name('usuario.editar');
        Route::put('configuracion/usuarios/{id}', 'update')->name('usuario.update');
        Route::delete('configuracion/usuarios/{id}', 'destroy')->name('usuario.destroy');
    });

    Route::controller(ReportesController::class)->group(function () {
        Route::get('configuracion/reportes/{id}', 'showReporte')->name('reporte.show');

        Route::get('configuracion/reportes/{id}/validacion', 'showEditReporte')->name('reporte.editar');
        Route::put('configuracion/reporte/{id}', 'update')->name('reporte.update');
    });


});