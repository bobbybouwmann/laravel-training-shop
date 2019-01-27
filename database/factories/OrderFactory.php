<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'invoice_number' => $faker->numberBetween(1000, 100000),
        'status' => $faker->randomElement([
            App\Order::STATUS_CREATED,
            App\Order::STATUS_PROCESSING,
            App\Order::STATUS_COMPLETED,
            App\Order::STATUS_PROCESSING,
            App\Order::STATUS_CANCELLED,
        ]),
    ];
});
