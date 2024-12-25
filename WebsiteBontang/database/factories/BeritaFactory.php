<?php

namespace Database\Factories;

use App\Models\Berita;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeritaFactory extends Factory
{
    protected $model = Berita::class;

    public function definition()
    {
        return [
            'judul' => $this->faker->sentence,  
            'slug' => $this->faker->slug,       
            'thumbnail' => 'https://via.placeholder.com/640x480/000000/000000?text=Thumbnail', 
            'isi' => $this->faker->paragraph,   
        ];
    }
}
