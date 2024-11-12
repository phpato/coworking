<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un usuario con rol de admin
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@twgroup.cl',
            'password' => Hash::make('12345678'), // No olvides usar Hash::make para encriptar la contraseña
            'role' => 'admin', // Asignar rol de admin
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Crear un usuario con rol de client
        DB::table('users')->insert([
            'name' => 'Patricio',
            'email' => 'patriciocabreravera@gmail.com',
            'password' => Hash::make('12345678'), // También encriptar la contraseña
            'role' => 'client', // Asignar rol de client
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
