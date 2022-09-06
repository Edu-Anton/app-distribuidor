<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductImage;
use Faker\Generator as Faker;

$factory->define(ProductImage::class, function (Faker $faker) {
    return [
        // 'image' => $faker->imageUrl($width = 640, $height = 480),
        'image' => asset('img/christian.jpg'),
        'product_id' => $faker->numberBetween(1, 100)
    ];
});
