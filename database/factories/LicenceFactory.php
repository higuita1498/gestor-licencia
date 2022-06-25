<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Licence;
use App\Models\Partner;
use App\Models\Product;
use Faker\Generator as Faker;
use JetBrains\PhpStorm\Pure;

$factory->define(Licence::class, function (Faker $faker) {

    $partner = Partner::with('users')->get()->random();
    $product = Product::all()->random();

    return [
        'LicenseKey' => $faker->randomNumber(5),
        'ProductID' => $product->IdProduct,
        'product_id' => $product->id,
        'Status' => random_int(0, 3),
        'PartnerID' => $partner->PartnerID,
        'partner_id' => $partner->id,
        'MasterCode' => $faker->swiftBicNumber,
        'UserID' => $partner->users->first()->UserID,
        'user_id' => $partner->users->first()->id,
        'ExpirationDate' => now(),
    ];
});
