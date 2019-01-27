<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->safeColorName,
        'price' => $faker->randomFloat(2, 5, 999),
        'sku' => $faker->unique()->colorName,
        'stock' => $faker->numberBetween(5, 99),
        'active' => true,
    ];
});
