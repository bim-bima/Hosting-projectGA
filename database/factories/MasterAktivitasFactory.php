<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MasterAktivitas>
 */
class MasterAktivitasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ma_nama_aktivitas' => $this->faker->name(),
            'ma_category_aktivitas' => $this->faker->name(),
        ];
    }
}
