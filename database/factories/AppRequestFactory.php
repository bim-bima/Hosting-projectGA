<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AppRequest>
 */
class AppRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ar_request' => $this->faker->title(),
            'ar_perequest' => $this->faker->name(),
            'ar_kebutuhan' => $this->faker->name(),
            'ar_tanggal_estimasi' => $this->faker->date(),
            'ar_catatan' => $this->faker->title(),
        ];
    }
}
