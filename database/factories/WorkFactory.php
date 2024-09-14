<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WorkFactory extends Factory
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
            'title' => "Ez a mű címe.",
            'slug' => "ez-a-mu-cime",
            'release_date' => "2023-01-01",
            'body' => "Ez a mű tartalma.",
            'active' => 1,
            'category' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
