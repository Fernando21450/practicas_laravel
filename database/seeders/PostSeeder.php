<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $usuarios=User::all();

        foreach ($usuarios as $usuario) {
            // cada usuario crea 3 publicaciones
            Post::factory()->count(3)->create([
                'user_id'=>$usuario->id
            ]);
        }
    }
}
