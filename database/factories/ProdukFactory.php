<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'kategori_id' => fake()->numberBetween(1, 10),
            'brand_id' => fake()->numberBetween(1, 10),
            'unit_id' => fake()->numberBetween(1, 10),
            'nama' => fake()->word,
            'sku' => fake()->word,
            'deskripsi' => fake()->sentence,
            'stok' => fake()->numberBetween(1, 10),
            'harga_beli' => fake()->numberBetween(10000, 100000000),
            'harga_jual' => fake()->numberBetween(10000, 100000000),
            'gambar' => fake()->imageUrl
        ];
    }
}
