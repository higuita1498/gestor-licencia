<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Partner;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Partner::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'identification_number' => $faker->unique()->randomNumber(8),
        'status' => random_int(0,1),
        'partner_type_id' => random_int(1,3),
        'phone_number' => $faker->unique()->randomNumber(8),
        'address' => $faker->address(),
    ];
});
