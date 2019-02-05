<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'imageable_type' => null,
        'imageable_id' => null,
        'path' => 'https://dummyimage.com/640x4:3/',
    ];
});
