<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Work;
use Faker\Generator as Faker;

$factory->define(Work::class, function (Faker $faker) {
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
});
