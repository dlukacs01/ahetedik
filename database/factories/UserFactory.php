<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

class UserFactory extends Factory
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

            // KOLTOK
            'username' => $this->faker->unique()->userName(),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$uuzZ6C8FcameysV60sIaYOTTGZJaCWtGBhcSuwYtFT2H9SCKP10My', // Ahetedik0123!?#
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
