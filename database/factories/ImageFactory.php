<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    $imageable = [
        App\Category::class,
        App\Product::class,
    ];

    $imageableType = $faker->randomElement($imageable);
    $imageable = factory($imageableType)->create();

    return [
        'imageable_type' => $imageableType,
        'imageable_id' => $imageable->id,
        'path' => 'https://dummyimage.com/640x4:3/',
    ];
});
