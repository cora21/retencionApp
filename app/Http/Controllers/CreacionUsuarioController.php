<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class CreacionUsuarioController extends Controller{
    // Mostrar el formulario de creación de usuarios
    public function index(){
        $roles = Role::all();
        return view('layouts.gestionUsuario.gestion', compact('roles'));
    }
    
    public function create()
    {
        // Obtener todos los roles disponibles
        $roles = Role::all();
        return view('layouts.gestionUsuario.gestion', compact('roles'));
    }
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,name', // Asegurarse de que el rol exista
        ]);
         // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encripta la contraseña
        ]);
        // Asignar el rol seleccionado
        $user->assignRole($request->role);

        // Redirigir con mensaje de éxito
        return redirect()->route('usuario.index')->with('success', 'Usuario creado exitosamente.');
        }
}
