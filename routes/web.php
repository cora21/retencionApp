<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CreacionUsuarioController;
use App\Http\Controllers\PerfilController;

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        // Redirige según el rol del usuario
        if (auth()->user()->hasRole('Administrador')) {
            return view('dashboard');
        } elseif (auth()->user()->hasRole('Empresa')) {
            return redirect()->route('empresa.inicio');
        }
    })->name('dashboard');

    // Ruta para la vista de Empresa
    Route::get('/empresa/inicio', function () {
        return view('empresaInicio');
    })->name('empresa.inicio');
    // Otras rutas
    Route::get('index', [UsuariosController::class, 'index'])->name('usuario.index');
    
    //rutas para la creacion de usuarios
    Route::get('gestion-usuarios', [CreacionUsuarioController::class, 'index'])->name('gestion.index');
    Route::post('creacion-usuarios', [CreacionUsuarioController::class, 'store'])->name('gestion.store');

    //ruta para las empresas todo dentro de la la carpeta empresa
    Route::get('perfilEmpresa', [PerfilController::class, 'index'])->name('perfilEmpresa.index');
    Route::put('perfilEmpresa/update', [PerfilController::class, 'update'])->name('perfilEmpresa.update');

});

