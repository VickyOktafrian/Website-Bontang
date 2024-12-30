<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->sentence, 

            'slug' => $this->faker->slug,       
            'gambar' => 'https://via.placeholder.com/640x480/000000/000000?text=Thumbnail', 
            'deskripsi' => $this->faker->paragraph, 
            'harga' => $this->faker->numberBetween(10000, 1000000),
            'stok'=>$this->faker->numberBetween(1.100)
        ];
    }
}
