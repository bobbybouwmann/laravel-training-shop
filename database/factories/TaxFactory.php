<?php

use Faker\Generator as Faker;

$factory->define(App\Tax::class, function (Faker $faker) {
    $value = $faker->randomElement([9, 21]);

    return [
        'name' => sprintf('%d%s', $value, '%'),
        'value' => $value,
    ];
});

$factory->state(App\Tax::class, 'nine-percent', [
    'name' => '9%',
    'value' => 9,
]);

$factory->state(App\Tax::class, 'twenty-one-percent', [
    'name' => '21%',
    'value' => 21,
]);

