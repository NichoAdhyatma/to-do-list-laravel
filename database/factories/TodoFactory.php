<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'mahasiswa_id' => mt_rand(1,5),
            'todo' => fake()->sentence(2),
            'keterangan' => fake()->sentence(1),
            'is_active' => fake()->boolean(),
            'is_done' => fake()->boolean() 
        ];
    }
}
