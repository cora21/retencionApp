<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Asegúrate de usar el modelo User
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        // Crear un usuario específico
        User::create([
            'name' => 'Obrayan', // Cambia esto
            'email' => 'obrayanacosta2021@gmail.com', // Cambia esto
            'password' => Hash::make('password'), // Contraseña: password
            'email_verified_at' => now(),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);

        // Crear 9 usuarios aleatorios
        User::factory(10)->create();
    }
}
