<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

    return [
        //

        'user_id' => 1,
        'title' => "Ez a lapszám címe",
        'slug' => "ez-a-lapszam-cime",
        'post_image' => $faker->imageUrl('900', '300'),
        'active' => $faker->randomElement([0, 1]),
        'created_at' => now()
    ];
});
