<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'url_img' => $this->faker->imageUrl(),
        ];
    }
}
