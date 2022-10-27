<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'as_nama_asset' => $this->faker->name(),
            'as_mla_id' => $this->faker->title(),
            'as_mca_id' => $this->faker->title(),
            'as_tanggal' => $this->faker->datetime(),
            'as_kode_asset' => $this->faker->name(),
            'as_harga' => $this->faker->title(),
            'as_umur_manfaat' => $this->faker->title(),
            'as_jumlah' => $this->faker->title()
        ];
    }

}
