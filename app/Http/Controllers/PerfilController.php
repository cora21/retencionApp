<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller{
    
    // Mostrar el formulario de perfil
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar si el perfil está incompleto
        $perfilIncompleto = !$user->empresa || empty($user->empresa->nombre_comercial);

        return view('layouts.empresa.perfilEmpresa', compact('perfilIncompleto'));
    }


    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'nombre_comercial' => 'required|string|max:255',
        'direccionEmpresa' => 'required|string|max:255',
        'telefonoEmpresa' => 'required|string|max:20',
        'descripcionEmpresa' => 'nullable|string',
        'rif_cedulaEmpresa' => 'required|string|max:20',
        'correoEmpresa' => 'required|string|email|max:255',
    ]);

    // Crear el usuario
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Crear la empresa relacionada
    $user->empresa()->create([
        'nombre_comercial' => $request->nombre_comercial,
        'direccionEmpresa' => $request->direccionEmpresa,
        'telefonoEmpresa' => $request->telefonoEmpresa,
        'descripcionEmpresa' => $request->descripcionEmpresa,
        'rif_cedulaEmpresa' => $request->rif_cedulaEmpresa,
        'correoEmpresa' => $request->correoEmpresa,
    ]);

    // Asignar el rol de Empresa
    $role = Role::findByName('Empresa');
    $user->assignRole($role);

    // Redirigir con un mensaje de éxito
    return redirect()->route('perfilEmpresa.index')->with('success', 'Empresa creada exitosamente.');
}

// Actualizar el perfil de la empresa
public function update(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'nombre_comercial' => 'required|string|max:255',
        'direccionEmpresa' => 'required|string|max:255',
        'telefonoEmpresa' => 'required|string|max:20',
        'descripcionEmpresa' => 'nullable|string',
        'rif_cedulaEmpresa' => 'required|string|max:20',
        'correoEmpresa' => 'required|string|email|max:255',
    ]);

    // Obtener el usuario autenticado
    $user = Auth::user();

    // Crear o actualizar el perfil de la empresa
    if ($user->empresa) {
        // Actualizar los datos existentes
        $user->empresa->update($request->all());
    } else {
        // Crear un nuevo registro de empresa
        $user->empresa()->create($request->all());
    }

    // Redirigir con un mensaje de éxito
    return redirect()->route('perfilEmpresa.index')->with('success', 'Perfil actualizado exitosamente.');
}

}
