<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'name' => $faker->company,
        'address' => $faker->address,
        'tax_identification_number' => $faker->numberBetween(400000, 800000),
    ];
});
