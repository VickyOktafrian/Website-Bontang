<?php

namespace Database\Factories;

use App\Models\carousel;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarouselFactory extends Factory
{
    protected $model = carousel::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,  // generates a fake title
            'thumbnail' => 'https://tse4.mm.bing.net/th?id=OIP.jlPB6P7Ga9tvgyRCU3FzUwHaE8&pid=Api&P=0&h=220',
        ];
    }
}
