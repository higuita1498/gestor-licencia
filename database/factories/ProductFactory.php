<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'ProductStatus' => random_int(0, 1),
        'ProductName' => $faker->name,
        'NumberOfLicenses' => random_int(0,200),
        'LicenseDuration' => random_int(0,12),
        'ProductName' => $faker->streetName,
        'IdProduct' => $faker->unique()->uuid(),
    ];
});
