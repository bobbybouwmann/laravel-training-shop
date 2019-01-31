<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'status' => $faker->randomElement([
            App\Order::STATUS_CREATED,
            App\Order::STATUS_PROCESSING,
            App\Order::STATUS_COMPLETED,
            App\Order::STATUS_PROCESSING,
            App\Order::STATUS_CANCELLED,
        ]),
    ];
});
