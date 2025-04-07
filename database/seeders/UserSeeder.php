<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //crea 5 usuarios
        User::factory()->count(5)->create();

        //usuario admin manual para login de pruebas
        User::create([
            'name'=>'Admin',
            'email'=>'admin@example.com',
            'password'=>Hash::make('password')
        ]);

    }
}
