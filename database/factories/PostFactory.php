<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //

            'user_id' => 1,
            'title' => "Ez a lapszám címe",
            'slug' => "ez-a-lapszam-cime",
            'post_image' => $this->faker->imageUrl('900', '300'),
            'active' => $this->faker->randomElement([0, 1]),
            'created_at' => now()
        ];
    }
}
