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

            // 'as_ma_id'=> mt_rand(1,3),
            'as_nama_asset' => $this->faker->numberBetween(1121212, 512212),
            'as_mla_id' => $this->faker->numberBetween(1, 2),
            'as_kode_asset' => $this->faker->numberBetween(10, 99),
            'as_harga' => $this->faker->numberBetween(10000000, 200000000),
            'as_nilai_residu' => $this->faker->numberBetween(1000000, 200000000),
            'as_umur_manfaat' => $this->faker->numberBetween(1, 10),

            // 'as_mla_id' => mt_rand(1,3),
            // 'as_kode_asset' => mt_rand(1,3),
            // 'as_harga' => mt_rand(1,3),
            // 'as_nilai_residu' => mt_rand(1,3),
            // 'as_umur_manfaat' =>mt_rand(1,3),
            // 'are_created_at' => mt_rand(1,3),
            // 'are_updated_at' => mt_rand(1,3),

        ];
        // return [
        //     'user_id'      => $this->faker->numberBetween(1, 5),
        //     'phone_number' => $this->faker->unique()->phoneNumber,
        // ];
    }

}
