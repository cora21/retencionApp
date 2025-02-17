<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        // Primero, crear los roles
        $this->call(RolePermissionSeeder::class);

        // Luego, crear los usuarios
        $this->call(UsuariosSeeder::class);
    }
}