<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PartnerType;
use Faker\Generator as Faker;

$factory->define(PartnerType::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'description' => $faker->sentence,
        'status' => random_int(0,1),
    ];
});
