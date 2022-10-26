<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aktivitas>
 */
class AktivitasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            // 'reminder' => $this->faker->reminder(),
            // 'repeat' => $this->faker->repeat(),
            // 'frekuensi' => $this->faker->frekuensi(),
            // 'todate' => $this->faker->todate(),
            'ulangi' => $this->faker->title(),
            'start_date' => $this->faker->date($format='Y-M-D'),
            'end_date' => $this->faker->date($format='Y-M-D'),
            'prioritas' => $this->faker->name(),
            // 'deskripsi' => $this->faker->deskripsi(),
            // 'penanganan' => $this->faker->penanganan()
        ];
    }
}
