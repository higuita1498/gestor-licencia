<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Licence;
use App\Models\Partner;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Licence::class, function (Faker $faker) {

    $partner = Partner::with('users')->get()->random();
    $product = Product::all()->random();
    $licenceStatus = random_int(1, 4);

    return [
        'LicenseKey' => $faker->unique()->uuid(),
        'ProductID' => $product->ProductID,
        'product_id' => $product->id,
        'Status' => $licenceStatus,
        'PartnerID' => $partner->PartnerID,
        'partner_id' => $partner->id,
        'MasterCode' => ($licenceStatus > 1)
            ? $faker->swiftBicNumber
            : null,
        'UserID' => ($licenceStatus === 3 || $licenceStatus === 4 )
            ? $partner->users->first()->UserID
            : null,
        'user_id' => ($licenceStatus === 3 || $licenceStatus === 4 )
            ? $partner->users->first()->id
            : null,
        'ExpirationDate' => ($licenceStatus === 3 || $licenceStatus === 4)
            ? $faker->dateTimeBetween(now(), now()->addYear())
            : null,
    ];
});
