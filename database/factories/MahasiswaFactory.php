<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nrp' => mt_rand(1000, 10000),
            'nama' => fake()->name(),
            'kelas' => mt_rand(1,3),
            'angkatan' => mt_rand(2020, 2022),
            'no_telp' => fake()->phoneNumber()
        ];
    }
}
