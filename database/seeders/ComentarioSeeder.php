<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $usuarios=User::all();
        $posts=Post::all();

        foreach ($posts as $post) {
            // cada post recibe 2 comentarios
            Comentario::factory()->count(2)->create([
                'post_id'=>$post->id,
                'user_id'=>$usuarios->random()->id,
            ]);
        }

    }
}
