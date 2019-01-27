<?php

use Faker\Generator as Faker;

$factory->define(App\Address::class, function (Faker $faker) {
    return [
        'street' => $faker->streetName,
        'house_number' => $faker->numberBetween(1, 365),
        'house_number_addition' => $faker->boolean ? 'a' : null,
        'zipcode' => $faker->postcode,
        'country' => 'nl',
    ];
});
