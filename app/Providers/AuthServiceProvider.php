<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    
    //Asginar permisos de acuerdo al rol del usuario
    public function boot(): void
    {
        //Subir reporte
        Gate::define('upload', function (User $user) {
            return $user->Rol == 'Administrador' 
            or $user->Rol == 'Responsable de reportes';
        });

        //Lista Candados
        Gate::define('administrar_candados', function (User $user) {
            return $user->Rol == 'Administrador' 
            or $user->Rol == 'Responsable de candados';
        });

        //Lista de usuarios
        Gate::define('administrar_usuarios', function (User $user) {
            return $user->Rol == 'Administrador';
        });
        

        //Lista reportes
        Gate::define('administrar_reportes', function (User $user) {
            return $user->Rol == 'Administrador'
            or $user->Rol == 'Responsable de reportes';
        });


    }
}
