<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MasterKendaraan>
 */
class MasterKendaraanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'mk_nama_kendaraan' => $this->faker->name(),
            'mk_no_polisi' => $this->faker->title(),
            'mk_jenis' => $this->faker->name(),
            'mk_merk' => $this->faker->name(),
            'mk_warna' => $this->faker->name(),
            'mk_bahan_bakar' => $this->faker->name(),
            'mk_kilometer' => $this->faker->title(),
            'mk_kondisi_lain' => $this->faker->title()
        ];
    }
}
