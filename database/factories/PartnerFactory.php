<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Partner;
use Faker\Generator as Faker;

$factory->define(Partner::class, function (Faker $faker) {
    return [
        'PartnerName' => $faker->company(),
        'PartnerContactName' => $faker->name,
        'PartnerContactNumber' => $faker->unique()->randomNumber(8),
        'PartnerStatus' => random_int(0, 1),
        'PartnerEmail' => $faker->unique()->email,
    ];
});
