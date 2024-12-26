<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wisata>
 */
class WisataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence,
            'slug' => $this->faker->slug, // Membuat slug berdasarkan judul
            'thumbnail' => 'https://tse4.mm.bing.net/th?id=OIP.jlPB6P7Ga9tvgyRCU3FzUwHaE8&pid=Api&P=0&h=220',
            'isi' => $this->faker->paragraphs(5, true),
        ];
    }
}
