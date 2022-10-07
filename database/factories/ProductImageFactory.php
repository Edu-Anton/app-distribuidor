<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductImage;
use Faker\Generator as Faker;

$factory->define(ProductImage::class, function (Faker $faker) {
    return [
        // 'image' => $faker->imageUrl($width = 640, $height = 480),
        // 'image' => 'http://127.0.0.1:8000/img/christian.jpg',
        'image' => 'https://picsum.photos/seed/picsum/200',
        'product_id' => $faker->numberBetween(1, 100)
    ];
});
