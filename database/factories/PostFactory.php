<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{

    public function definition(): array
    {
        return [
            'titulo'=>$this->faker->sentence(),
            'contenido'=>$this->faker->paragraph(5),
            'user_id'=>1 //se sobreescribe en el seeder
        ];
    }
}
